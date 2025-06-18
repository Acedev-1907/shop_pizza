@extends('master.main')

@section('main')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg"
            data-background="{{ asset('/assets/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h2 class="title">Change password</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Change password</li>
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
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-md-3">
                            <div class="contact-content">
                                <div class="section-title mb-15">
                                    <span class="sub-title">Reseet password</span>
                                    {{-- <h2 class="title">Reseet <span>password</span></h2> --}}
                                </div>
                                <p>The best pizza in the world.</p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="contact-form-wrap">

                                        <div class="form-grp">
                                            <input name="password" type="password" placeholder="Your password *" required>
                                            @error('password')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-grp">
                                            <input name="confirm_password" type="password" placeholder="Comffirm password *"
                                                required>
                                            @error('confirm_password')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit">Reset your password</button>
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
