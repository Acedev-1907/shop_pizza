<div
    style="border: 2px solid #efe6d2; padding: 15px; border-radius: 10px; background: #EFE8D9; width: 600px; margin: auto;">
    <h2 style="color: #df2614">Hi {{ $order->customer->name }}!</h2>
    <p style="font-size:20px">Your order detail</p>
    <table style="border-collapse: collapse; width: 100%;" cellpadding="5" cellspacing="0">
        <tr>
            <th style="border: 1px solid #382F1E;">STT</th>
            <th style="border: 1px solid #382F1E;">Product name</th>
            <th style="border: 1px solid #382F1E;">Price</th>
            <th style="border: 1px solid #382F1E;">Quantity</th>
            <th style="border: 1px solid #382F1E;">Sub Total</th>
        </tr>

        @foreach ($order->details as $detail)
            <tr>
                <td style="border: 1px solid #382F1E;">{{ $loop->index + 1 }}</td>
                <td style="border: 1px solid #382F1E;">{{ $detail->product->name }}</td>
                <td style="border: 1px solid #382F1E;">{{ $detail->price }}</td>
                <td style="border: 1px solid #382F1E;">{{ $detail->quantity }}</td>
                <td style="border: 1px solid #382F1E;">{{ number_format($detail->price * $detail->quantity) }}</td>
            </tr>
        @endforeach
    </table>
    <p>
        <a href="{{ route('order.verify', $token) }}"
            style="display: inline-block; padding: 7px 25px; color: #ffffff; background-color: orange; border-radius: 5px; text-decoration: none;">Click
            here to verify order</a>
    </p>
</div>
