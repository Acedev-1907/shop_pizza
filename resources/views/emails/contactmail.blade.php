<div
    style="border: 2px solid #efe6d2; padding: 15px; border-radius: 10px; background: #EFE8D9; width: 600px; margin: auto;">
    {{-- <h2 style="color: #df2614">Hi {{ $order->customer->name }}!</h2> --}}
    <p style="font-size:20px">New Contact</p>
    <table style="border-collapse: collapse; width: 100%;" cellpadding="5" cellspacing="0">
        <p>Name:{{ $data['name'] }}</p>
        <p>Email:{{ $data['email'] }}</p>
        <p>Phone:{{ $data['phone'] }}</p>
        <p>Name:{{ $data['subject'] }}</p>
        <p>Nessage:{{ $data['message'] }}</p>

    </table>
</div>
