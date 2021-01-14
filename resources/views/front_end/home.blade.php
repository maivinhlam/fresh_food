@extends('front_end.layouts.common')
@section('myHead')
<link rel="stylesheet" href="../css/owl.carousel.css">
<link rel="stylesheet" href="../css/owl.theme.default.css">
@endsection
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

    <div class="newProduct container">
            <div class="title text-center">
                <i>THỰC PHẨM MỚI NHẤT</i>
            </div>
            <div class="icon text-center mb-3">
                <img src="../images/leaves.png" alt="">
            </div>
            <div class="listProduct">
                <div class="owl-carousel owl-theme  owl-carousel-new">
                    @foreach($new_products as $product)
                        <div class="card d-flex flex-grow-1 align-self-stretch" >
                            <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <p class="card-text">{{ number_format($product->price, 0, ',', '.' ) }}đ</p>
                                <div class="addToCart">Thêm vào giỏ hàng</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="listproduct__button">
                    <div class="listproduct__button__prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="listproduct__button__next"><i class="fas fa-chevron-right"></i></div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="newProduct container">
        <div class="title text-center">
            <i>THỰC PHẨM XEM NHIỀU</i>
        </div>
        <div class="icon text-center mb-3">
            <img src="../images/leaves.png" alt="">
        </div>
        <div class="listProduct">
            <div class="owl-carousel owl-theme owl-carousel-hotview">
                @foreach($hot_view_products as $product)
                    <div class="card d-flex flex-grow-1 align-self-stretch" >
                        <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text">{{ number_format($product->price, 0, ',', '.' ) }}đ</p>
                            <div class="addToCart">Thêm vào giỏ hàng</div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="listproduct__button">
                <div class="listproduct__button__prev"><i class="fas fa-chevron-left"></i></div>
                <div class="listproduct__button__next"><i class="fas fa-chevron-right"></i></div>
            </div> --}}
        </div>
    </div>
</div>
{{--
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
--}}
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
<script src="../js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        var owl_new = $('.owl-carousel-new');
        owl_new.owlCarousel({
            loop: true,
            nav: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
        owl_new.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY > 0) {
                owl_new.trigger('next.owl');
            } else {
                owl_new.trigger('prev.owl');
            }
            e.preventDefault();
        });

        var owl_hotview = $('.owl-carousel-hotview');
        owl_hotview.owlCarousel({
            loop: true,
            nav: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
        owl_hotview.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY > 0) {
                owl_hotview.trigger('next.owl');
            } else {
                owl_hotview.trigger('prev.owl');
            }
            e.preventDefault();
        });
    });
</script>

@endsection
