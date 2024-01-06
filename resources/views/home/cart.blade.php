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
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->prod->name }}</td>
                                    <td>
                                        <img src="{{ asset('/upload/product') . '/' . $item->prod->image }}" width="140">
                                    </td>
                                    <td>
                                        @if ($item->prod->sale_price > 0)
                                            <span
                                                style="display: inline-block;"><s>{{ number_format($item->prod->price, 0, ',', '.') }}₫</s></span>
                                            <span style="display: inline-block; color:red"
                                                class="price">{{ number_format($item->prod->sale_price, 0, ',', '.') }}
                                                ₫</span>
                                        @else
                                            <span class="price">
                                                {{ number_format($item->prod->price, 0, ',', '.') }}
                                                ₫</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->product_id) }}" method="get">
                                            <input type="number" value="{{ $item->quantity }}" name="quantity"
                                                style="width:60px; text-align:center" min="0">
                                            <button style="border: none; background: none;">
                                                <i class="fas fa-save fa-lg" style="font-size: 25px"></i>
                                            </button>
                                        </form>
                                    </td>
                                    {{-- <td>{{ $item->quantity }}</td> --}}
                                    <td>
                                        <a title="Remove product from cart"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            href="{{ route('cart.delete', $item->product_id) }}"><i
                                                class="far fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="text-center">
                        @if ($carts->count())
                            <a href="{{ route('home.allcategory') }}" class="btn">Continue shopping</a>
                            <a class="btn" onclick="return confirm('Are you sure to delete all products?')"
                                href="{{ route('cart.clear') }}">Clear Shopping</a>
                            <a href="{{ route('order.checkout') }}" class="btn">Plance Order</a>
                        @else
                            <a href="{{ route('home.allcategory') }}" class="btn">Continue shopping</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
