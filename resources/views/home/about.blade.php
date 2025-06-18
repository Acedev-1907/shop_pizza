@extends('master.main')

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
                            <h2 class="title">About us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">about us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- choose-area -->
        <section class="choose-area choose-area-two choose-bg" data-background="upload/bg/choose_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50">
                            <span class="sub-title">About Bemet</span>
                            <h2 class="title">Why Choose Our Shop</h2>
                            <div class="title-shape" data-background="upload/images/title_shape.png"></div>
                        </div>
                    </div>
                </div>
                <div class="choose-item-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="choose-item">
                                <div class="choose-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408 325"
                                        preserveAspectRatio="none">
                                        <path
                                            d="M330.5,2316h368a20,20,0,0,1,20,20l-29,285a20,20,0,0,1-20,20h-299a20,20,0,0,1-20-20l-40-285A20,20,0,0,1,330.5,2316Z"
                                            transform="translate(-310.5 -2316)" />
                                    </svg>
                                </div>
                                <div class="choose-icon">
                                    <i class="flaticon-online-shop"></i>
                                </div>
                                <div class="choose-content">
                                    <div class="line" data-background="upload/images/line.png"></div>
                                    <h2 class="title">variety of choices</h2>
                                    <p>Various fillings such as seafood, cold meat, cheese, vegetarian dishes... for you to
                                        choose from.
                                    </p>
                                    <a href="#" class="link-btn">learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="choose-item">
                                <div class="choose-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408 325"
                                        preserveAspectRatio="none">
                                        <path
                                            d="M330.5,2316h368a20,20,0,0,1,20,20l-29,285a20,20,0,0,1-20,20h-299a20,20,0,0,1-20-20l-40-285A20,20,0,0,1,330.5,2316Z"
                                            transform="translate(-310.5 -2316)" />
                                    </svg>
                                </div>
                                <div class="choose-icon">
                                    <i class="flaticon-chicken-1"></i>
                                </div>
                                <div class="choose-content">
                                    <div class="line" data-background="upload/images/line.png"></div>
                                    <h2 class="title">Guaranteed raw materials</h2>
                                    <p>All ingredients are carefully selected, full of nutrition, good for health.
                                    </p>
                                    <a href="#" class="link-btn">learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="choose-item">
                                <div class="choose-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408 325"
                                        preserveAspectRatio="none">
                                        <path
                                            d="M330.5,2316h368a20,20,0,0,1,20,20l-29,285a20,20,0,0,1-20,20h-299a20,20,0,0,1-20-20l-40-285A20,20,0,0,1,330.5,2316Z"
                                            transform="translate(-310.5 -2316)" />
                                    </svg>
                                </div>
                                <div class="choose-icon">
                                    <i class="flaticon-chicken-wings"></i>
                                </div>
                                <div class="choose-content">
                                    <div class="line" data-background="upload/images/line.png"></div>
                                    <h2 class="title">good price</h2>
                                    <p>The product price is considered suitable for the market, and there are also many
                                        attractive incentives
                                    </p>
                                    <a href="#" class="link-btn">learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choose-area-end -->

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
                                                <p>The best pizza in the world.</p>
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
                                                <p>The best pizza in the world.</p>
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
                                                <p>The best pizza in the world.</p>
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

    </main>
    <!-- main-area-end -->
@stop
