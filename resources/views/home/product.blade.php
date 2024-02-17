@extends('master.main')
@section('title', $product->name)
@section('main')
    <!-- main-area -->
    <main>
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('assets/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">{{ $product->name }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->
        <section class="shop-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shop-details-images-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel"
                                    aria-labelledby="itemOne-tab" tabindex="0">
                                    <a href="{{ asset('/upload/product') . '/' . $product->image }}" class="popup-image">
                                        <img id="big-img" src="{{ asset('/upload/product') . '/' . $product->image }}"
                                            alt="{{ $product->name }}" style="max-width: 635px; max-height: 665px;">
                                    </a>
                                </div>

                            </div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link">
                                        <img class="thumb-image"
                                            src="{{ asset('/upload/product') . '/' . $product->image }}"
                                            alt="{{ asset('/upload/product') . '/' . $product->image }}"
                                            style="width: 140px; height: 140px;">
                                    </button>
                                </li>
                                @foreach ($product->images as $img)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link">
                                            <img class="thumb-image"
                                                src="{{ asset('/upload/product') . '/' . $img->image }}"
                                                alt="{{ asset('/upload/product') . '/' . $img->image }}"
                                                style="width: 140px; height: 140px;">
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-details-content">
                            <h2 class="title">{{ $product->name }}</h2>
                            <div class="review-wrap">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span>(4 customer reviews)</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                @if ($product->sale_price > 0)
                                    <h3 class="price"><s>{{ number_format($product->price, 0, ',', '.') }}₫</s>
                                    </h3>
                                    <h3 class="price" style="margin-left: 8px">
                                        {{ number_format($product->sale_price, 0, ',', '.') }}₫</h3>
                                @else
                                    <h3 class="price">{{ number_format($product->price, 0, ',', '.') }}₫</h3>
                                @endif
                            </div>
                            <div class="product-count-wrap">
                                <span class="title">Hurry Up! Sale ends in:</span>
                                <div class="coming-time" data-countdown="2024/7/6"></div>
                            </div>
                            <p>{!! $product->description !!}</p>
                            <div class="shop-details-qty">
                                <span class="title">Quantity :</span>

                                @if (auth('cus')->check())
                                    <form action="{{ route('cart.add', $product->id) }}">
                                        <div class="shop-details-qty-inner">
                                            <div class="form-row">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1" name="quantity">
                                                </div>
                                            </div>
                                            <button class="purchase-btn">
                                                Add to cart
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('account.login') }}">
                                        <div class="shop-details-qty-inner">
                                            <div class="form-row">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1" name="quantity">
                                                </div>
                                            </div>
                                            <button class="purchase-btn"
                                                onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')">
                                                Add to cart
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>

                            {{-- <a href="#" class="buy-btn">Buy it now</a> --}}
                            @if (auth('cus')->check())
                                @if ($product->favorited)
                                    <div class="shop-add-Wishlist">
                                        <a title="Bỏ thích" style="color: #d81313;"
                                            onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                            href="{{ route('home.favorite', $product->id) }}"><i
                                                class="fas fa-heart fa-lg">
                                            </i> Add to Wishlist</a>
                                    </div>
                                @else
                                    <div class="shop-add-Wishlist">
                                        <a title="Yêu thích" href="{{ route('home.favorite', $product->id) }}"><i
                                                class="far fa-heart fa-lg"></i> Add to Wishlist</a>
                                    </div>
                                @endif
                            @endif
                            <div class="sd-category">
                                <span class="title">CATEGORY:</span>
                                <ul class="list-wrap">
                                    <li><a href="{{ route('home.product', $product->id) }}">{{ $product->cat->name }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-desc-wrap">
                            <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description-tab-pane" type="button" role="tab"
                                        aria-controls="description-tab-pane" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                        aria-controls="reviews-tab-pane" aria-selected="false">Reviews (0)</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="descriptionTabContent">
                                <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                                    aria-labelledby="description-tab" tabindex="0">
                                    <div class="product-description-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                                    aria-labelledby="reviews-tab" tabindex="0">
                                    <div class="product-desc-review">
                                        <div class="product-desc-review-title mb-15">
                                            <h5 class="title">Customer Reviews (0)</h5>
                                        </div>
                                        <div class="left-rc">
                                            <p>No reviews yet</p>
                                        </div>
                                        <div class="right-rc">
                                            <a href="#">Write a review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- product-area -->
        <section class="related-product-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50">
                            <span class="sub-title">Organic Shop</span>
                            <h2 class="title">Related Products</h2>
                            <div class="title-shape" data-background="assets/img/images/title_shape.png"></div>
                        </div>
                    </div>
                </div>
                <div class="product-item-wrap-three">
                    <div class="row justify-content-center rp-active">
                        @foreach ($prod_related as $prod)
                            <div class="col-xl-3 ">
                                <div class="product-item-three inner-product-item">
                                    <div class="product-thumb-three">
                                        <a href="{{ route('home.product', $prod->id) }}"><img
                                                src="{{ asset('/upload/product') . '/' . $prod->image }}" alt=""
                                                style="max-width: 225px; max-height: 150px; display: math;
                                            }"></a>

                                        <span class="batch">New<i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="product-content-three">
                                        <a href="#" class="tag">{{ $prod->cat->name }}</a>
                                        <h2 class="title"><a
                                                href="{{ route('home.product', $prod->id) }}">{{ $prod->name }}</a>
                                        </h2>

                                        @if ($prod->sale_price > 0)
                                            <span style="display: inline-block;">
                                                <s>{{ number_format($prod->price, 0, ',', '.') }}₫</s>
                                            </span>
                                            <h2 style="display: inline-block;" class="price">
                                                {{ number_format($prod->sale_price, 0, ',', '.') }}
                                                ₫</h2>
                                        @else
                                            <h2 class="price">
                                                {{ number_format($prod->price, 0, ',', '.') }}
                                                ₫</h2>
                                        @endif

                                        <div class="product-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
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
        </section>
        <!-- product-area-end -->

    </main>
    <!-- main-area-end -->
@stop

@section('js')
    <script>
        $('.thumb-image').click(function(e) {
            e.preventDefault();

            var _url = $(this).attr('src');
            // alert(_url)
            $('#big-img').attr('src', _url)
        })
    </script>
@stop()
