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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Favorite date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($favorites as $item)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->prod->name }}</td>
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
                                        <img src="{{ asset('/upload/product') . '/' . $item->prod->image }}" width="140">
                                    </td>
                                    <td>{{ $item->created_at->format('d/m/y') }}</td>
                                    <td>
                                        @if ($item->prod->favorited)
                                            <a title="Bỏ thích" onClick="return confirm('Bạn có muốn bỏ thích không?')"
                                                href="{{ route('home.favorite', $item->prod->id) }}"><i
                                                    class="fas fa-heart fa-lg"></i></a>
                                        @else
                                            <a title="Yêu thích" href="{{ route('home.favorite', $item->prod->id) }}"><i
                                                    class="far fa-heart fa-lg"></i></a>
                                        @endif
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
