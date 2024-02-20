@extends('master.main')
@section('title', 'Favorites')
@section('main')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('/upload/bg/cta_bg.png') }}" style="padding: 48px 0 140px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Favorites</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Your Favorites</li>
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
                        <thead style="text-align: center;">
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="mt-3" style="text-align: center;">
                            @foreach ($favorites as $item)
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
                                        <div class="product-cart-wrap">
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

                                            <form action="{{ route('cart.add', $item->prod->id) }}"
                                                style="display: -webkit-box;">

                                                <div class="cart-plus-minus">
                                                    <input type="number" value="1" name="quantity">
                                                </div>
                                                <button style="border: none; background: none;">
                                                    <i class="fas fa-cart-plus"
                                                        style="font-size: 25px; vertical-align: -webkit-baseline-middle;"></i>
                                                </button>
                                            </form>
                                            <div class="mt-3">
                                                @if ($item->prod->favorited)
                                                    <a title="Bỏ thích"
                                                        onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                                        href="{{ route('home.favorite', $item->prod->id) }}"><i
                                                            class="fas fa-heart fa-lg" style="font-size: 35px"></i></a>
                                                @else
                                                    <a title="Yêu thích"
                                                        href="{{ route('home.favorite', $item->prod->id) }}"><i
                                                            class="far fa-heart fa-lg" style="font-size: 35px"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
