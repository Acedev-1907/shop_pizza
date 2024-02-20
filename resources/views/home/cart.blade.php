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
                            <h2 class="title">Cart</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
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
                            <tr style="text-align:center">
                                <th>ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            @foreach ($carts as $item)
                                <div class="form-group">
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>
                                            <div>
                                                {{ $item->prod->name }}
                                                <img src="{{ asset('/upload/product') . '/' . $item->prod->image }}"
                                                    width="140">
                                            </div>
                                            @if ($item->prod->sale_price > 0)
                                                <span
                                                    style="display: inline-block;"><s>{{ number_format($item->prod->price, 0, ',', '.') }}₫</s></span>
                                                <span style="display: inline-block; color:red"
                                                    class="price">{{ number_format($item->prod->sale_price, 0, ',', '.') . ' đ' }}</span>
                                            @else
                                                <span class="price" style="display: inline-block;">
                                                    {{ number_format($item->prod->price, 0, ',', '.') . ' đ' }}
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <style>
                                                /* Ẩn mũi tên lên và xuống */
                                                input[type="number"]::-webkit-inner-spin-button,
                                                input[type="number"]::-webkit-outer-spin-button {
                                                    -webkit-appearance: none;
                                                    margin: 0;
                                                }

                                                input[type="number"] {
                                                    -moz-appearance: textfield;
                                                }
                                            </style>
                                            <div class="product-cart-wrap">
                                                <form action="{{ route('cart.update', $item->product_id) }}" method="get"
                                                    style="display: -webkit-box;">
                                                    <div class="cart-plus-minus">
                                                        <input type="number" value="{{ $item->quantity }}" name="quantity">
                                                    </div>
                                                    <button style="border: none; background: none;">
                                                        <i class="fas fa-save fa-lg"
                                                            style="font-size: 25px; vertical-align: -webkit-baseline-middle;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="product-cart-wrap mt-2" style="text-align: center">
                                                <a title="Remove product from cart"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    href="{{ route('cart.delete', $item->product_id) }}"><i
                                                        class="far fa-trash-alt fa-lg" style="font-size: 25px;"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="text-center">
                        @if ($carts->count())
                            <a href="{{ route('home.allcategory') }}" class="btn wow fadeInUp mt-3">Continue shopping</a>
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
