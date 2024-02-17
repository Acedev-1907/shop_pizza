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
                            <h2 class="title">Order history</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Order history</li>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order date</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auth->orders as $item)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span style="color: red">Chưa xác nhận</span>
                                        @elseif ($item->status == 1)
                                            <span style="color: green">Đã xác nhận</span>
                                        @elseif ($item->status == 2)
                                            <span style="color: green">Đã thanh toán</span>
                                        @else
                                            <span style="color: green">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->totalPrice) }} đ</td>
                                    <td>
                                        <a href="{{ route('order.detail', $item->id) }}"
                                            class="btn btn-sm btn-priary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="text-center">
                        @if ($carts->count())
                            <a href="{{ route('home.allcategory') }}" class="btn wow fadeInUp">Continue shopping</a>
                            <a class="btn wow fadeInUp mt-3"
                                onclick="return confirm('Are you sure to delete all products?')"
                                href="{{ route('cart.clear') }}">Clear Shopping</a>
                            <a href="{{ route('order.checkout') }}" class="btn wow fadeInUp mt-3">Plance Order</a>
                        @else
                            <a href="{{ route('home.allcategory') }}" class="btn wow fadeInUp mt-3">Continue shopping</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
