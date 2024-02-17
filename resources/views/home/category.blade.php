@extends('master.main')
@section('title', $cat->name)
@section('main')

    {{-- Css cho form card product --}}
    <style>
        .form-row {
            display: flex;
            align-items: center;
        }

        .form-row input[type="text"] {
            margin-right: 10px;
        }
    </style>
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('/upload/bg/breadcrumb_bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">{{ $cat->name }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-area -->
        <section class="shop-area shop-bg" data-background="{{ asset('/assets/bg/shop_bg.jpg') }}">
            <div class="container custom-container-five">
                <div class="shop-inner-wrap">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-item-wrap">
                                <div class="row">
                                    @foreach ($products as $prod)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="product-item-three inner-product-item">
                                                <div class="product-thumb-three">
                                                    <a href="{{ route('home.product', $prod->id) }}"><img
                                                            src="{{ asset('/upload/product') . '/' . $prod->image }}"
                                                            alt="" style="max-width: 250px; max-height: 250px;"></a>
                                                    <span class="batch">New<i class="fas fa-star"></i></span>
                                                </div>
                                                <div class="product-content-three">
                                                    <a href="#" class="tag">{{ $prod->cat->name }}</a>
                                                    <h2 class="title"><a
                                                            href="{{ route('home.product', $prod->id) }}">{{ $prod->name }}</a>
                                                        @if (auth('cus')->check())
                                                            @if ($prod->favorited)
                                                                <a title="Bỏ thích" style="color: #d81313;"
                                                                    onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                                                    href="{{ route('home.favorite', $prod->id) }}"><i
                                                                        class="fas fa-heart fa-lg"></i></a>
                                                            @else
                                                                <a title="Yêu thích"
                                                                    href="{{ route('home.favorite', $prod->id) }}"><i
                                                                        class="far fa-heart fa-lg"></i></a>
                                                            @endif
                                                        @endif
                                                    </h2>
                                                    @if ($prod->sale_price > 0)
                                                        <span style="display: inline-block;">
                                                            <s>{{ number_format($prod->price, 0, ',', '.') }}₫</s>
                                                        </span>
                                                        <h2 style="display: inline-block;" class="price">
                                                            {{ number_format($prod->sale_price, 0, ',', '.') }}₫</h2>
                                                    @else
                                                        <h2 class="price">
                                                            {{ number_format($prod->price, 0, ',', '.') }}₫</h2>
                                                    @endif

                                                    @if (auth('cus')->check())
                                                        <div class="product-cart-wrap">
                                                            <form action="{{ route('cart.add', $prod->id) }}">
                                                                <div class="form-row">
                                                                    <div class="cart-plus-minus">
                                                                        <input type="text" value="1"
                                                                            name="quantity">
                                                                    </div>
                                                                    <button style="border: none; background: none;">
                                                                        <i class="fas fa-cart-plus"
                                                                            style="font-size: 25px"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div class="product-cart-wrap">
                                                            <form action="{{ route('account.login') }}">
                                                                <div class="form-row">
                                                                    <div class="cart-plus-minus">
                                                                        <input type="text" value="1"
                                                                            name="quantity">
                                                                    </div>
                                                                    <button style="border: none; background: none;"
                                                                        onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')">
                                                                        <i class="fas fa-cart-plus"
                                                                            style="font-size: 25px"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="product-shape-two">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445"
                                                        preserveAspectRatio="none">
                                                        <path
                                                            d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z"
                                                            transform="translate(-309 -3802)" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- lọc sản phẩm --}}
                        <div class="col-xl-3 col-lg-4">
                            <div class="shop-sidebar">
                                {{-- <div class="shop-widget">
                                    <h4 class="sw-title">FILTER BY</h4>
                                    <div class="price_filter">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <input type="submit" class="btn" value="Filter">
                                            <span>Price :</span>
                                            <input type="text" id="amount" name="price"
                                                placeholder="Add Your Price" />
                                        </div>
                                        <div class="clear-btn">
                                            <button type="reset"><i class="far fa-trash-alt"></i>Clear all</button>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="shop-widget">
                                    <h4 class="sw-title">Category</h4>
                                    <div class="shop-cat-list">
                                        <ul class="list-wrap">
                                            @foreach ($cats_home as $cat)
                                                <li>
                                                    <div class="shop-cat-item">
                                                        <a href="{{ route('home.category', $cat->id) }}"
                                                            class="form-check-label" for="catOne">{{ $cat->name }}
                                                            <span>{{ $cat->products->count() }}</span></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-widget">
                                    <h4 class="sw-title">Latest Products</h4>
                                    <div class="latest-products-wrap">
                                        @foreach ($new_products as $np)
                                            <div class="lp-item">
                                                <div class="lp-thumb">
                                                    <a href="{{ route('home.product', $np->id) }}"><img
                                                            src="{{ asset('/upload/product') . '/' . $np->image }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="lp-content">
                                                    <h4 class="title"><a
                                                            href="{{ route('home.product', $np->id) }}">{{ $np->name }}</a>
                                                    </h4>

                                                    @if ($np->sale_price > 0)
                                                        <span style="display: inline-block;">
                                                            <s>{{ number_format($np->price, 0, ',', '.') }}₫</s>
                                                        </span>
                                                        <span style="display: inline-block;" class="price">
                                                            {{ number_format($np->sale_price, 0, ',', '.') }}
                                                            ₫</span>
                                                    @else
                                                        <span class="price">
                                                            {{ number_format($np->price, 0, ',', '.') }}₫</span>
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->

    </main>
    <!-- main-area-end -->
@stop
