<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\CustomerResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function login()
    {
        return view('account.login');
    }

    public function favorite()
    {
        $favorites = auth('cus')->user()->favorites;

        return view('account.favorite', compact('favorites'));
    }

    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required',
        ]);
        $data = $req->only(['email', 'password']);
        $check = auth('cus')->attempt($data);

        if ($check) {
            if (auth('cus')->user()->email_verified_at == '') {
                auth('cus')->logout();
                return redirect()->back()->with('no', 'You account is not verify, please check email again');
            }
            return redirect()->route('home.index')->with('ok', 'Welcome to my website');
        }
        return redirect()->back()->with('no', 'Your account or password invalid');
    }

    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('account.login')->with('ok', 'You are logged out');
    }

    public function register()
    {
        return view('account.register');
    }

    public function check_register(Request $req)
    {
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

        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok', 'Register successfully please check your email to verify account');
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function verify($email)
    {
        $acc = Customer::where('email', $email)->whereNULL('email_verified_at')->firstOrFail();
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok', 'verify account successfully');
        return view('account.change_password');
    }

    public function profile()
    {
        $auth = auth('cus')->user();
        return view('account.profile', compact('auth'));
    }

    public function check_profile(Request $req)
    {
        $auth = auth('cus')->user();
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers,email,' . $auth->id,
            'password' => ['required', function ($attr, $value, $fail) use ($auth) {
                if (!Hash::check($value, $auth->password)) {
                    return $fail('Your password is not much');
                }
            }],
        ], [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên tối thiểu là 6 ký tự',
        ]);

        $data = $req->only(['name', 'email', 'phone', 'address', 'gender']);

        $check = $auth->update($data);

        if ($check) {
            return redirect()->back()->with('ok', 'Update your profile successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function change_password()
    {
        return view('account.change_password');
    }

    public function check_change_password(Request $req)
    {
        $auth = auth('cus')->user();
        $req->validate([
            'old_password' => [
                'required',
                function ($attr, $value, $fail) use ($auth) {
                    $auth = auth('cus')->user();
                    if (!Hash::check($value, $auth->password)) {
                        $fail('Your password is not match');
                    }
                }
            ],
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ]);
        $data['password'] = bcrypt($req->password);
        $check = $auth->update($data);
        if ($check) {
            auth('cus')->logout();
            return redirect()->route('account.login')->with('ok', 'Update your password successfully');
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function forgot_password()
    {
        return view('account.forgot_password');
    }

    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers',
        ]);

        $customer = Customer::where('email', $req->email)->first();

        $existingToken = CustomerResetToken::where('email', $req->email)->first();

        if ($existingToken) {
            // Email has already been sent
            return redirect()->back()->with('no', 'An email has already been sent to this email address. Please check your email to continue.');
        }

        $token = \Str::random(50);
        $tokenData = [
            'email' => $req->email,
            'token' => $token,
        ];

        if (CustomerResetToken::create($tokenData)) {
            Mail::to($req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->back()->with('ok', 'Email sent successfully. Please check your email to continue.');
        }

        return redirect()->back()->with('no', 'Something went wrong. Please try again.');
    }

    public function reset_password($token)
    {
        $tokenData = CustomerResetToken::checkToken($token);
        return view('account.reset_password');
    }

    public function check_reset_password($token)
    {
        request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        $tokenData = CustomerResetToken::checkToken($token);
        $customer = $tokenData->customer;
        $data = [
            'password' => bcrypt(request('password'))
        ];

        $check = $customer->update($data);
        // dd($check);
        if ($check) {
            auth('cus')->logout();
            return redirect()->route('account.login')->with('ok', 'Update your password successfully');
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }
}
