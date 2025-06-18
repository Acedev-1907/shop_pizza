@extends('master.main')

@section('main')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('/upload/bg/cta_bg.png') }}" style="padding: 48px 0 140px">
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area">
            <div class="contact-wrap" style="padding:55px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-md-3">
                            <div class="contact-content">
                                <div class="section-title mb-15">
                                    <span class="sub-title">Experien</span>
                                    <h2 class="title">Log <span>in</span></h2>
                                </div>
                                <p>The best pizza in the world.</p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="contact-form-wrap">
                                        <div class="form-grp">
                                            <input name="email" type="email" placeholder="Your email *" required>
                                            @error('email')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-grp">
                                            <input name="password" type="password" placeholder="Your password *" required>
                                            @error('password')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit">Login</button>
                                        <a style="display: block; text-align:center; margin-top:15px"
                                            href="{{ route('account.register') }}">Click here to create new account</a>
                                        <a style="display: block; text-align:center; margin-top:15px"
                                            href="{{ route('account.forgot_password') }}">Forgot password</a>
                                    </div>
                                </form>
                                <p class="ajax-response mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
