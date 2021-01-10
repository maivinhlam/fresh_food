@extends('front_end.layouts.common')

@section('content')
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

</style>
<div class="hero">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slides as $slide)
                @if($loop->index == 0)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active"></li>
                @else
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class=""></li>
                @endif

            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slides as $slide)
                @if($loop->index == 0)
                    <div class="carousel-item active">
                        <img src="/{{ $slide->image }}" class="d-block w-100" alt="...">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="/{{ $slide->image }}" class="d-block w-100" alt="...">
                    </div>
                @endif
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<main class="index">
    <div class="container">
        <div class="categorys">
            <div class="category">
                <img src="../images/img-featured-01.png" alt="" srcset="">
                <div class="title">
                    <a href="#" class="hoverborder">thực phẩm</a>
                </div>
            </div>

            <div class="category">
                <img src="../images/img-featured-02.png" alt="" srcset="">
                <div class="title">
                    <a href="#">rau sạch</a>
                </div>
            </div>

            <div class="category">
                <img src="../images/img-featured-03.png" alt="" srcset="">
                <div class="title">
                    <a href="#">trái cây</a>
                </div>
            </div>
        </div>
    </div>

    <div class="newProduct">
        <div class="container">
            <div class="title">
                <i>THỰC PHẨM MỚI NHẤT</i>
            </div>
            <div class="icon">
                <img src="../images/leaves.png" alt="">
            </div>
            <div class="listProduct">
                <div class="owl-carousel owl-theme listProduct__carousel">
                    @foreach($new_products as $product)
                        <div class="owl-item product ">
                            <div class="card d-flex flex-grow-1 align-self-stretch" >
                                <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $product->name }}</h4>
                                  <p class="card-text">{{ number_format($product->price, 0, ',', '.' ) }}đ</p>
                                  <div class="addToCart">Thêm vào giỏ hàng</div>
                                </div>
                            </div>

                            {{-- <div class="image flex-grow-1 align-self-stretch">
                                <img src="/{{ $product->image_path }}" alt="{{ $product->name }}">
                            </div>
                            <div class="content align-self-stretch">
                                <div class="title">{{ $product->name }}</div>
                                <div class="price">{{ number_format($product->price, 0, ',', '.' ) }}đ</div>
                                <div class="addToCart">Thêm vào giỏ hàng</div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
                <div class="listproduct__button">
                    <div class="listproduct__button__prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="listproduct__button__next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="newProduct">
        <div class="container">
            <div class="title">
                <i>THỰC PHẨM XEM NHIỀU</i>
            </div>
            <div class="icon">
                <img src="../images/leaves.png" alt="">
            </div>
            <div class="listProduct">
                <div class="owl-carousel owl-theme listProduct__carousel">
                    @foreach($hot_view_products as $product)
                        <div class="owl-item product ">
                            <div class="card d-flex flex-grow-1 align-self-stretch" >
                                <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $product->name }}</h4>
                                  <p class="card-text">{{ number_format($product->price, 0, ',', '.' ) }}đ</p>
                                  <div class="addToCart">Thêm vào giỏ hàng</div>
                                </div>
                            </div>

                            {{-- <div class="image flex-grow-1 align-self-stretch">
                                <img src="/{{ $product->image_path }}" alt="{{ $product->name }}">
                            </div>
                            <div class="content align-self-stretch">
                                <div class="title">{{ $product->name }}</div>
                                <div class="price">{{ number_format($product->price, 0, ',', '.' ) }}đ</div>
                                <div class="addToCart">Thêm vào giỏ hàng</div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
                <div class="listproduct__button">
                    <div class="listproduct__button__prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="listproduct__button__next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="newProduct">
        <div class="container">
            <div class="title">
                <i>THỰC PHẨM MUA NHIỀU</i>
            </div>
            <div class="icon">
                <img src="../images/leaves.png" alt="">
            </div>
            <div class="listProduct">
                <div class="owl-carousel owl-theme listProduct__carousel">
                    @foreach($hot_buy_products as $product)
                        <div class="owl-item product ">
                            <div class="card d-flex flex-grow-1 align-self-stretch" >
                                <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $product->name }}</h4>
                                  <p class="card-text">{{ number_format($product->price, 0, ',', '.' ) }}đ</p>
                                  <div class="addToCart">Thêm vào giỏ hàng</div>
                                </div>
                            </div>

                            {{-- <div class="image flex-grow-1 align-self-stretch">
                                <img src="/{{ $product->image_path }}" alt="{{ $product->name }}">
                            </div>
                            <div class="content align-self-stretch">
                                <div class="title">{{ $product->name }}</div>
                                <div class="price">{{ number_format($product->price, 0, ',', '.' ) }}đ</div>
                                <div class="addToCart">Thêm vào giỏ hàng</div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
                <div class="listproduct__button">
                    <div class="listproduct__button__prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="listproduct__button__next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="handBook">
        <div class="container">
            <div class="title">Cẩm nang nấu ăn</div>
            <div class="icon">
                <img src="../images/noodles.png" alt="">
            </div>
            <div class="listHandBook">
                <div class="book">
                    <div class="img">
                        <img src="../images/book1.png" alt="" srcset="">
                    </div>
                    <div class="title">Thịt bò hầm nấm</div>
                    <div class="text">Chúng ta vẫn biết rằng, làm việc với một đoạn văn bản dễ đọc và rõ nghĩa dễ gây rối trí và cản trở việc tập trung vào yếu tố trình bày văn bản [...]</div>
                </div>

                <div class="book">
                    <div class="img">
                        <img src="../images/book2.png" alt="" srcset="">
                    </div>
                    <div class="title">Dạ dày trộn cay</div>
                    <div class="text">Chúng ta vẫn biết rằng, làm việc với một đoạn văn bản dễ đọc và rõ nghĩa dễ gây rối trí và cản trở việc tập trung vào yếu tố trình bày văn bản [...]</div>
                </div>

                <div class="book">
                    <div class="img">
                        <img src="../images/book3.png" alt="" srcset="">
                    </div>
                    <div class="title">Bí quyết nấu ăn ngon</div>
                    <div class="text">Chúng ta vẫn biết rằng, làm việc với một đoạn văn bản dễ đọc và rõ nghĩa dễ gây rối trí và cản trở việc tập trung vào yếu tố trình bày văn bản...</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('myscript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script src="../js/script.js"></script>

@endsection
