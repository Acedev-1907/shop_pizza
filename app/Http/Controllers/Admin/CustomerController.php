<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyAccount;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::orderBy('id', 'desc')->paginate(20);

        if ($key = request()->key) {
            $data = Customer::orderBy('created_at', 'DESC')
                ->where(function ($query) use ($key) {
                    $query->where('name', 'LIKE', '%' . $key . '%')
                        ->orWhere('phone', 'LIKE', '%' . $key . '%')
                        ->orWhere('email', 'LIKE', '%' . $key . '%');
                })
                ->paginate(10);
        }

        return view('admin.customers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        // Validate the request data
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'phone' => 'required|min:10|max:15|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên tối thiểu là 6 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.min' => 'Email tối thiểu là 6 ký tự',
            'email.max' => 'Email tối đa là 100 ký tự',
            'email.unique' => 'Email đã được đăng ký',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại tối thiểu là 10 ký tự',
            'phone.max' => 'Số điện thoại tối đa là 15 ký tự',
            'phone.unique' => 'Số điện thoại đã được đăng ký',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu là 4 ký tự',
            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu',
        ]);

        $data = $req->only(['name', 'email', 'phone', 'address', 'gender']);
        $data['password'] = bcrypt($req->password);
        // dd($data);
        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('customer.index')->with('ok', 'Register successfully please check your email to verify account');
        }
        return redirect()->back()->withInput('no', 'Something error, please try again');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Customer $customer)
    {
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers,email,' . $customer->id,
        ], [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên tối thiểu là 6 ký tự',
        ]);

        $data = $req->only(['name', 'email', 'phone', 'address', 'gender']);
        // dd($data);
        $customer->update($data);

        if ($customer) {
            return redirect()->back()->with('ok', 'Update your profile successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Xóa các order detail liên quan đến khách hàng
        OrderDetail::whereHas('order', function ($query) use ($customer) {
            $query->where('customer_id', $customer->id);
        })->delete();

        // Xóa các đơn hàng liên quan đến khách hàng
        Order::where('customer_id', $customer->id)->delete();

        // Xóa các favorites liên quan đến khách hàng
        Favorite::where('customer_id', $customer->id)->delete();

        Cart::where('customer_id', $customer->id)->delete();

        // Xóa khách hàng
        $customer->delete();
        if ($customer) {
            return redirect()->back()->with('ok', 'Deleted your profile successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }
}
