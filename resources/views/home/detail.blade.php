@extends('master.main')
@section('title', 'Favorites')
@section('main')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('/upload/bg/breadcrumb_bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Order detail</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Order detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area">
            <div class="contact-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
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

                        <div class="col-md-5 offset-md-2">
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
                        <h5>Status:
                            <td>
                                @if ($auth->status == 0)
                                    <span style="color: red">Unconfimred.</span>
                                @elseif ($auth->status == 1)
                                    <span style="color: green">Confirmed.</span>
                                @elseif ($auth->status == 2)
                                    <span style="color: green">Delivered.</span>
                                @else
                                    <span style="color: red">Cancelled.</span>
                                @endif
                            </td>
                        </h5>
                        <table class="table mt-3">
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
