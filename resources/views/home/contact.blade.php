@extends('master.main')
@section('title', 'Contact')
@section('main')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Contact us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>
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
            <div class="contact-info-wrap contact-info-bg" data-background="assets/img/bg/contact_info_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="flaticon-call"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Phone</h4>
                                    <span>+84 79 4946 985</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Email</h4>
                                    <span>{{ config('mail.from.address') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Address</h4>
                                    <span>133/1 Nguyen Duy, Q8, TP.HCM</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="flaticon-location-1"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">HeadOffice</h4>
                                    <span>133/1 Nguyen Duy, Q8, TP.HCM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="contact-content">
                                <div class="section-title mb-15">
                                    <span class="sub-title">Experien</span>
                                    <h2 class="title">Get in <span>Touch</span></h2>
                                </div>
                                <form action="{{ route('home.store') }}" method="POST">
                                    @csrf
                                    <div class="contact-form-wrap">
                                        <div class="form-grp">
                                            <input name="name" id="name" type="text" placeholder="Your Name *"
                                                required>
                                        </div>
                                        <div class="form-grp">
                                            <input name="email" id="email" type="email" placeholder="Your Email *"
                                                required>
                                        </div>
                                        <div class="form-grp">
                                            <input name="phone" id="phone" type="number" placeholder="Phone *"
                                                required>
                                        </div>
                                        <div class="form-grp">
                                            <input name="subject" id="subject" type="text" placeholder="Subject *"
                                                required>
                                        </div>
                                        <div class="form-grp">
                                            <textarea name="message" id="subject" placeholder="Message"></textarea>
                                        </div>
                                        @if (Session::has('msg'))
                                            <p class="alert alert-success">{{ Session::get('msg') }}</p>
                                        @endif
                                        <button type="submit">Send Message</button>
                                    </div>
                                </form>
                                <p class="ajax-response mb-0"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.99714056158!2d106.64022207451663!3d10.734703259962997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e6e4ec83565%3A0xa75460b8adf8d8c0!2zMTQwIMSQLiBMxrB1IEjhu691IFBoxrDhu5tjLCBQaMaw4budbmcgMTUsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1708242032386!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" allowfullscreen loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
@stop
