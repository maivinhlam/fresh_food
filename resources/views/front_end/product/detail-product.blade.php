@extends('front_end.layouts.common')
@section('myHead')
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="../css/detail-product.css">
@endsection
@section('content')

<div class="row mt-5">
    <div class="col-8">
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
                <div class="id">{{ $product->id }}</div>
                <div class="price">{{ number_format($product->price, 0, ',', '.' ) }}</div>
                <div class="description">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="addToCard">
                    <a href="#">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        <div class="info">
            <i class="title">Thông tin sản phẩm:</i>
            {!! $articles !!}

        </div>
        <div class="comment">
            <img src="../images/comment.png" alt="" srcset="">
        </div>
    </div>
    <div class="right col-4" id="sidebar">
        @include('front_end.product.sidebar')
    </div>
</div>

@endsection

