@extends('master.main')
@section('title', 'Favorites')
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
                            <h2 class="title">Cart</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
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

            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="POST">
                            @csrf
                            <div class="contact-form-wrap">
                                <div class="form-grp">
                                    <label for="">Name:</label>
                                    <input name="name" value="{{ $auth->name }}" type="text"
                                        placeholder="Your name *" required>
                                    @error('name')
                                        <div class="help-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="">Email:</label>
                                    <input name="email" value="{{ $auth->email }}" type="email"
                                        placeholder="Your email *" required readonly style="color: #999;">
                                    @error('email')
                                        <div class="help-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="">Phone:</label>
                                    <input name="phone" value="{{ $auth->phone }}" type="text"
                                        placeholder="Your phone *" required>
                                    @error('phone')
                                        <div class="help-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="">Address:</label>
                                    <input name="address" value="{{ $auth->address }}" type="text"
                                        placeholder="Your address *" required>
                                    @error('address')
                                        <div class="help-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit">Place Order</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $item)
                                    <div class="form-group">
                                        <tr>
                                            <td scope="row">{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    {{ $item->prod->name }}
                                                    <img src="{{ asset('/upload/product') . '/' . $item->prod->image }}"
                                                        width="140">
                                                </div>
                                            </td>

                                            <td>
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
                                                <form action="{{ route('cart.update', $item->product_id) }}" method="get"
                                                    style="display: inline-flex;">
                                                    <input type="number" value="{{ $item->quantity }}" name="quantity"
                                                        style="max-width:35px; text-align:center" min="0">
                                                    <button style="border: none; background: none;">
                                                        <i class="fas fa-save fa-lg" style="font-size: 25px"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            {{-- <td>{{ $item->quantity }}</td> --}}
                                            <td>
                                                <a title="Remove product from cart"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    href="{{ route('cart.delete', $item->product_id) }}"><i
                                                        class="far fa-trash-alt fa-lg"></i></a>
                                            </td>
                                        </tr>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            @if ($carts->count())
                                <a href="{{ route('home.allcategory') }}" class="btn wow fadeInUp mt-3">Continue
                                    shopping</a>
                                <a class="btn wow fadeInUp mt-3"
                                    onclick="return confirm('Are you sure to delete all products?')"
                                    href="{{ route('cart.clear') }}">Clear Cart</a>
                            @else
                                <a href="{{ route('home.allcategory') }}" class="btn wow fadeInUp mt-3">Continue
                                    shopping</a>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
            </div>

        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@stop
