@extends('front_end.layouts.common')
@section('myHead')
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="../css/detail-product.css">
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection
@section('content')

<div class="row mt-5">
    <div class="col-8 pr-1">
        <div class="row">
            <div class="col-6">
                <img src="{{ $product->image_path }}" alt="" srcset="" class="w-100">
            </div>
            <div class="col-6">
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <div class="name font-weight-bold">{{ $product->name }}</div>
                <div class="price">{{ number_format($product->price, 0, ',', '.' ) }}</div>
                <div class="description">
                    <p>{{ $product->description }}</p>
                </div>
                <form class="mt-5" method="POST" action="{{ route('add_to_cart') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4 d-flex flex-column justify-content-center">
                                Số lượng:
                            </div>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <div class="col-6 row text-center">
                                <button type="button" class="col-3 btn rounded-0 border border-secondary border-right-0">-</button>
                                <div class="col-6 px-0">
                                    <input type="number" class="form-control text-center rounded-0 border border-secondary" name="quantity" value="1">
                                </div>
                                <button type="button" class="col-3 btn rounded-0 border border-secondary border-left-0">+</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
                </form>

            </div>
        </div>
        <div class="info mt-4">
            <i class="title font-weight-bold">Thông tin sản phẩm:</i>
            {!! $articles !!}

        </div>
        <div class="comment">
            <img src="../images/comment.png" alt="" srcset="" class="w-100">
        </div>
    </div>
    <div class="right col-4" id="sidebar">
        @include('front_end.product.sidebar')
    </div>
</div>

@endsection
