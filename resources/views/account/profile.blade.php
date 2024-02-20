@extends('master.main')

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
                            <h2 class="title">Create your account</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create your account</li>
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
                                    <span class="sub-title">Experien</span>
                                    <h2 class="title">Hello! <span>{{ $auth->name }}</span></h2>
                                </div>
                                <p>This is your profile</p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="contact-form-wrap">
                                        <div class="form-grp">
                                            <input name="name" value="{{ $auth->name }}" type="text"
                                                placeholder="Your name *" required>
                                        </div>
                                        <div class="form-grp">
                                            <input name="email" value="{{ $auth->email }}" type="email"
                                                placeholder="Your email *" required>
                                            @error('email')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-grp">
                                            <input name="phone" value="{{ $auth->phone }}" type="text"
                                                placeholder="Your phone *" required>
                                            @error('phone')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-grp">
                                            <input name="address" value="{{ $auth->address }}" type="text"
                                                placeholder="Your address *" required>
                                        </div>
                                        <div class="form-grp">
                                            <select name="gender" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="0" {{ $auth->gender == 0 ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="1" {{ $auth->gender == 1 ? 'selected' : '' }}>FeMale
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-grp">
                                            <input name="password" type="password" placeholder="Your password *" required>
                                            @error('password')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit">Update Profile</button>
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
