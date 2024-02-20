<div
    style="border: 2px solid #efe6d2; padding: 15px; border-radius: 10px; background: #EFE8D9; width: 600px; margin: auto;">
    <h2 style="color: #df2614">Hi {{ $customer->name }}</h2>
    <p style="font-size:20px">Do you want to change your password?</p>
    <a href="{{ route('account.reset_password', $token) }}"
        style="display: inline-block; padding: 7px 25px; color: #ffffff; background-color: orange; border-radius: 5px; text-decoration: none;">Click
        here to change new password</a>
</div>
