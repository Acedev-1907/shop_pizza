@extends('master.main')
@section('title', 'Home')
@section('main')
    <!-- main-area -->
    <main>

        <!-- area-bg -->
        <div class="area-bg" data-background="upload/bg/area_bg.jpg">

            <!-- banner-area -->
            <section class="banner-area banner-bg tg-motion-effects"
                data-background="{{ asset('upload/banner/banner_bg.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-content">
                                <h1 class="title wow fadeInUp" data-wow-delay=".2s">{{ $top_product->name }}</h1>
                                <span class="sub-title wow fadeInUp"
                                    data-wow-delay=".4s">{{ $top_product->cat->name }}</span>
                                <a href="{{ route('home.product', $top_product->id) }}" class="btn wow fadeInUp"
                                    data-wow-delay=".6s">order
                                    now</a>
                            </div>
                            <div class="banner-img text-center wow fadeInUp" data-wow-delay=".8s">
                                <img src="{{ asset('/upload/product') . '/' . $top_product->image }}" style="width: 30%"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape-wrap">
                    <img src="upload/banner/banner_shape01.png" alt="" class="tg-motion-effects5">
                    <img src="upload/banner/banner_shape02.png" alt="" class="tg-motion-effects4">
                    <img src="upload/banner/banner_shape03.png" alt="" class="tg-motion-effects3">
                    <img src="upload/banner/banner_shape04.png" alt="" class="tg-motion-effects5">
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- features-area -->
            <section class="features-area pt-130 pb-70">
                <div class="container">
                    <div class="row">
                        @foreach ($new_products as $np)
                            <div class="col-lg-6">
                                <div class="features-item tg-motion-effects">
                                    <div class="features-content">
                                        <span>{{ $np->cat->name }}</span>
                                        <h4 class="title" style="display: flex; align-items: center;">
                                            <a href="{{ route('home.product', $np->id) }}">{{ $np->name }}</a>
                                            @if (auth('cus')->check())
                                                <div class="favorite-action" style="margin-left: 10px;">
                                                    @if ($np->favorited)
                                                        <a title="Bỏ thích"
                                                            onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                                            href="{{ route('home.favorite', $np->id) }}"
                                                            style="color:rgb(210, 46, 46)"><i
                                                                class="fas fa-heart fa-lg"></i></a>
                                                    @else
                                                        <a title="Yêu thích" href="{{ route('home.favorite', $np->id) }}"
                                                            style="color:rgb(210,
                                                            46, 46)"><i
                                                                class="far fa-heart fa-lg"></i></a>
                                                    @endif
                                                </div>
                                            @endif
                                        </h4>

                                        <div class="features-content" style="display: flex; align-items: center;">
                                            @if ($np->sale_price > 0)
                                                <h5 class="price"><s>{{ number_format($np->price, 0, ',', '.') }}₫</s>
                                                </h5>
                                                <h5 class="price" style="margin-left: 8px">
                                                    {{ number_format($np->sale_price, 0, ',', '.') }}₫</h5>
                                            @else
                                                <h5 class="price">{{ number_format($np->price, 0, ',', '.') }}₫</h5>
                                            @endif

                                            @if (auth('cus')->check())
                                                <div class="favorite-action" style="padding: 6px;">
                                                    <a title="Thêm vào giỏ hàng" href="{{ route('cart.add', $np->id) }}">
                                                        <i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            @else
                                                <div class="favorite-action" style="padding: 6px;">
                                                    <a title="Thêm vào giỏ hàng" href="{{ route('account.login') }}"
                                                        onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')"><i
                                                            class="fas fa-cart-plus fa-lg"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="features-img">
                                        <img style="padding-right: 10%; width: 250px;"
                                            src="{{ asset('/upload/product') . '/' . $np->image }}" alt="">
                                        <div class="features-shape">
                                            <img src="upload/images/features_shape.png" alt=""
                                                class="tg-motion-effects4">
                                        </div>
                                    </div>
                                    <div class="features-overlay-shape"
                                        data-background="upload/images/features_overlay.png">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- features-area-end -->

        </div>
        <!-- area-bg-end -->

        <!-- product-area -->
        <section class="product-area product-bg" data-background="upload/bg/product_bg01.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-60">
                            <span class="sub-title">Hot Hot</span>
                            <h2 class="title">Sale Pizza</h2>
                            <div class="title-shape" data-background="upload/images/title_shape.png"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($sale_products as $salesp)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="{{ route('home.product', $salesp->id) }}">
                                        <img src="{{ asset('/upload/product') . '/' . $salesp->image }}" alt=""
                                            style="max-width: 280px;">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="line" data-background="upload/images/line.png"></div>
                                    <h4 class="title"><a
                                            href="{{ route('home.product', $salesp->id) }}">{{ $salesp->name }}</a></h4>
                                    <h6 class="price"><span
                                            style="display: inline-block;"><s>{{ number_format($salesp->price, 0, ',', '.') }}₫</s></span>
                                        <span style="display: inline-block; color:red;"
                                            class="price">{{ number_format($salesp->sale_price, 0, ',', '.') }}₫</span>
                                    </h6>
                                    <div class="product-tag">
                                        <ul class="list-wrap">
                                            @if (auth('cus')->check())
                                                <div class="favorite-action">
                                                    @if ($salesp->favorited)
                                                        <a title="Bỏ thích"
                                                            onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                                            href="{{ route('home.favorite', $salesp->id) }}"><i
                                                                class="fas fa-heart fa-lg"></i></a>
                                                    @else
                                                        <a title="Yêu thích"
                                                            href="{{ route('home.favorite', $salesp->id) }}"><i
                                                                class="far fa-heart fa-lg"></i></a>
                                                    @endif
                                                    <a style="padding: 19px;" title="Thêm vào giỏ hàng"
                                                        href="{{ route('cart.add', $salesp->id) }}"><i
                                                            class="fas fa-cart-plus"></i></a>
                                                </div>
                                            @else
                                                <div class="favorite-action">
                                                    <a title="Thêm vào giỏ hàng" href="{{ route('account.login') }}"
                                                        onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')"><i
                                                            class="fas fa-cart-plus fa-lg"></i></a>
                                                </div>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 401 314"
                                        preserveAspectRatio="none">
                                        <path
                                            d="M331.5,1829h361a20,20,0,0,1,20,20l-29,274a20,20,0,0,1-20,20h-292a20,20,0,0,1-20-20l-40-274A20,20,0,0,1,331.5,1829Z"
                                            transform="translate(-311.5 -1829)" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="shop-shape">
                <img src="upload/product/product_shape01.png" alt="">
            </div>
        </section>
        <!-- product-area-end -->

        <!-- gallery-area -->
        <div class="gallery-area gallery-bg" data-background="upload/bg/product_bg01.jpg">
            <div class="container">
                <div class="gallery-item-wrap">
                    <div class="row justify-content-center">
                        <div class="col-88">
                            <div class="gallery-active">
                                @foreach ($gallerys as $gallery)
                                    <div class="gallery-item">
                                        <a href="upload/gallery/{{ $gallery->image }}" class="popup-image"><img
                                                src="upload/gallery/{{ $gallery->image }}"
                                                alt="upload/gallery/{{ $gallery->image }}"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gallery-area-end -->

        <!-- product-area -->
        <section class="product-area-two product-bg-two" data-background="upload/bg/product_bg02.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-70">
                            <span class="sub-title">Organic Shop</span>
                            <h2 class="title">Our Organic Products</h2>
                            <div class="title-shape" data-background="upload/images/title_shape.png"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($feature_products as $fp)
                        <div class="col-lg-6 col-md-10">
                            <div class="product-item-two">
                                <div class="product-img-two">
                                    <a href="{{ route('home.product', $fp->id) }}">
                                        <img src="{{ asset('/upload/product') . '/' . $fp->image }}" alt=""
                                            style="max-width: 140px;"></a>
                                </div>
                                <div class="product-content-two">
                                    <div class="product-info">
                                        <h4 class="title"><a
                                                href="{{ route('home.product', $fp->id) }}">{{ $fp->name }}</a></h4>
                                        <p
                                            style="
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                        ">
                                            {{ $fp->cat->name }}</p>
                                    </div>
                                    <div class="product-price">
                                        @if ($fp->sale_price > 0)
                                            <h5 class="price"><s>{{ number_format($fp->price, 0, ',', '.') }}₫</s></h5>
                                            <h5 class="price">{{ number_format($fp->sale_price, 0, ',', '.') }}₫</h5>
                                        @else
                                            <h5 class="price">{{ number_format($fp->price, 0, ',', '.') }}₫</h5>
                                        @endif
                                        <a href="#" class="tag">Garden</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="shop-now-btn text-center mt-40">
                    <a href="shop.html" class="btn">Shop Now</a>
                </div>
            </div>
        </section>
        <!-- product-area-end -->

        <!-- faq-area -->
        <section class="faq-area tg-motion-effects faq-bg" data-background="upload/bg/faq_bg.jpg">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="faq-img-wrap">
                            <img src="upload/images/faq_img01.png" alt="">
                            <img src="upload/images/faq_img02.png" alt="">
                            <img src="upload/images/faq_img03.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-content">
                            <div class="section-title mb-60">
                                <span class="sub-title">Customer Quotes</span>
                                <h2 class="title">Frequently <span>Asked</span> Questions.</h2>
                            </div>
                            <div class="faq-wrap">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                hamburg Meat is animal flesh food.
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Meat provide well shaped fresh and the organic meat well animals is
                                                    Humans have hunted schistoric times</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Revolution allowed the of animals
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Meat provide well shaped fresh and the organic meat well animals is
                                                    Humans have hunted schistoric times</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Meat is animal flesh food.
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Meat provide well shaped fresh and the organic meat well animals is
                                                    Humans have hunted schistoric times</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-shape-wrap">
                <img src="upload/images/faq_shape01.png" alt="" class="tg-motion-effects3">
                <img src="upload/images/faq_shape02.png" alt="" class="tg-motion-effects2">
            </div>
        </section>
        <!-- faq-area-end -->

        <!-- cta-area -->
        <section class="cta-area position-relative">
            <div class="cta-bg" data-background="upload/bg/cta_bg.png"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="cta-content">
                            <img src="{{ asset('assets/img/icon/cta_icon.png') }}" alt="">
                            <h2 class="title">Get a Free Quote</h2>
                            <div class="cta-bottom">
                                <a href="shop.html" class="btn">buy now</a>
                                <a href="tel:0123456789" class="btn call-btn"><i class="fas fa-headphones-alt"></i>make a
                                    call</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-area-end -->

        <!-- blog-post-area -->
        <section class="blog-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-70">
                            <span class="sub-title">Latest News</span>
                            <h2 class="title">Latest News Update</h2>
                            <div class="title-shape" data-background="upload/images/title_shape.png"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="upload/blog/blog_post01.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html"><i class="fas fa-user"></i>Hamolin Pilot</a></li>
                                        <li><i class="fas fa-comments"></i>03</li>
                                    </ul>
                                </div>
                                <h4 class="title"><a href="blog-details.html">Hamburg Meat is Animal Flesh Food</a></h4>
                                <p>Meat provide well shapd fresh and organic meat well animals is Humans.</p>
                                <div class="blog-post-bottom">
                                    <a href="blog-details.html" class="link-btn">Read More</a>
                                    <a href="blog-details.html" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="upload/blog/blog_post02.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html"><i class="fas fa-user"></i>Hamolin Pilot</a></li>
                                        <li><i class="fas fa-comments"></i>03</li>
                                    </ul>
                                </div>
                                <h4 class="title"><a href="blog-details.html">Good Source of Iron And Flesh Food</a></h4>
                                <p>Meat provide well shapd fresh and organic meat well animals is Humans.</p>
                                <div class="blog-post-bottom">
                                    <a href="blog-details.html" class="link-btn">Read More</a>
                                    <a href="blog-details.html" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="upload/blog/blog_post03.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html"><i class="fas fa-user"></i>Hamolin Pilot</a></li>
                                        <li><i class="fas fa-comments"></i>03</li>
                                    </ul>
                                </div>
                                <h4 class="title"><a href="blog-details.html">Chicken Sausage For Sale Humanely
                                        Raised</a></h4>
                                <p>Meat provide well shapd fresh and organic meat well animals is Humans.</p>
                                <div class="blog-post-bottom">
                                    <a href="blog-details.html" class="link-btn">Read More</a>
                                    <a href="blog-details.html" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-post-area-end -->

    </main>
    <!-- main-area-end -->

@stop
