@extends('master.admin')
@section('title', 'Order')
@section('main')
    <!-- main-area -->
    <main>
        @if ($order->status != 2)
            @if ($order->status != 3)
                <a href="{{ route('order.update', $order->id) }}?status=2" class="btn btn-success"
                    onclick="return confirm('Are you sure?')">Delivered</a>
                <a href="{{ route('order.update', $order->id) }}?status=3" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to cancel?')">Cancel Order</a>
            @else
                <a href="{{ route('order.update', $order->id) }}?status=1" class="btn btn-warning"
                    onclick="return confirm('Are you sure you want to cancel?')">Restore</a>
            @endif
        @endif
        <!-- contact-area -->
        <section class="contact-area">
            <div class="contact-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Your information</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $auth->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $auth->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $auth->address }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h3>Shipping information</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $auth->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $auth->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $auth->address }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <table class="table mt-3">
                            <h4>Product information</h4>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Prodcut name</th>
                                    <th>Product quantity</th>
                                    <th>Product price</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset('/upload/product') . '/' . $item->product->image }}"
                                                width="140"></td>
                                        <td> {{ $item->product->name }}</td>
                                        <td> {{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price) }} đ</td>
                                        <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
