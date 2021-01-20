@extends('front_end.layouts.common')
@section('myHead')
<link rel="stylesheet" href="../css/owl.carousel.css">
<link rel="stylesheet" href="../css/product.css">
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
<main class="index container">
    <section class="categorys">
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
    </section>

    <section class="list-product header">
        <div class="header-title text-center border-bottom-1 bg-white">
            <span>THỰC PHẨM MỚI NHẤT</span>
            <a href="#" class="text-danger ">Xem tất cả <i class="fas fa-chevron-circle-right "></i></a>
        </div>

        <div class="owl-carousel owl-theme header-content carousel-product bg-white" id="new-product">
            @foreach($new_products as $product)
                <a class="card" href="/product/{{ str_replace(" ", "-", $product->name) }}-i.{{ $product->id }}">
                    <img class="card-img-top" src="{{ $product->image_path }}">
                    <div class="card-body">
                        <h6 class="font-weight-bold pt-1">{{ $product->name }}</h6>
                        <div class="text-muted description text-truncate">{{ $product->description }}</div>
                        <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <div class="d-flex flex-column">
                                <div class="h6 font-weight-bold">{{ number_format($product->price, 0, ',', '.' ) }}đ</div>
                                <div class="text-muted rebate">{{ $product->sell_percen }}%</div>
                            </div>
                            <div class="btn btn-primary">Buy now</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <div class="wrapper">
        <div class="d-md-flex align-items-md-center">
            <div class="h3">Fruits and vegetables</div>
            <div class="ml-auto d-flex align-items-center views">
                <span class="btn text-success">
                    <span class="fas fa-th px-md-2 px-1"></span>
                    <span>Grid view</span>
                </span>
                <span class="btn">
                    <span class="fas fa-list-ul"></span>
                    <span class="px-md-2 px-1">List view</span>
                </span>
                <span class="green-label px-md-2 px-1">428</span>
                <span class="text-muted">Products</span>
            </div>
        </div>
        <div class="d-lg-flex align-items-lg-center pt-2">
            <div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border"> <label class="options">Most Popular <input type="radio" name="radio"> <span class="checkmark"></span>
                </label> <label class="options">Cheapest <input type="radio" name="radio" checked> <span class="checkmark"></span> </label> </div>
            <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label class="tick">Farm <input type="checkbox" checked="checked"> <span class="check"></span>
                </label> <span class="text-success px-2 count"> 328</span> </div>
            <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label class="tick">Bio <input type="checkbox"> <span class="check"></span> </label> <span
                    class="text-success px-2 count"> 72</span> </div>
            <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label class="tick">Czech republic <input type="checkbox"> <span class="check"></span> </label>
                <span class="border px-1 mx-2 mr-3 font-weight-bold count"> 12</span> <select name="country" id="country" class="bg-light">
                    <option value="" hidden>Country</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="Uk">UK</option>
                </select> </div>
        </div>
        <div class="d-sm-flex align-items-sm-center pt-2 clear">
            <div class="text-muted filter-label">Applied Filters:</div>
            <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0 my-sm-0 my-2">Selected Filtre <span class=" px-1 close">&times;</span> </div>
            <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0">Selected Filtre <span class=" px-1 close">&times;</span> </div>
        </div>
        <div class="filters"> <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span
                    class="px-1 fas fa-filter"></span></button> </div>
        <div id="mobile-filter">
            <div class="py-3">
                <h5 class="font-weight-bold">Categories</h5>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> vegetables <span class="badge badge-primary badge-pill">328</span>
                    </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Fruits <span class="badge badge-primary badge-pill">112</span> </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Kitchen Accessories <span
                            class="badge badge-primary badge-pill">32</span> </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Chefs Tips <span class="badge badge-primary badge-pill">48</span>
                    </li>
                </ul>
            </div>
            <div class="py-3">
                <h5 class="font-weight-bold">Brands</h5>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Royal Fields <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Crasmas Fields <input type="checkbox" checked> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Vegetarisma Farm <input type="checkbox" checked> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Farmar Field Eve <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">True Farmar Steve <input type="checkbox"> <span class="check"></span> </label> </div>
                </form>
            </div>
            <div class="py-3">
                <h5 class="font-weight-bold">Rating</h5>
                <form class="rating">
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> <span class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span>
                            <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                            <span class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                            <span class="check"></span> </label> </div>
                </form>
            </div>
        </div>
        <div class="content py-md-0 py-3">
            <section id="sidebar">
                <div class="py-3">
                    <h5 class="font-weight-bold">Categories</h5>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> vegetables <span
                                class="badge badge-primary badge-pill">328</span> </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Fruits <span class="badge badge-primary badge-pill">112</span>
                        </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Kitchen Accessories <span
                                class="badge badge-primary badge-pill">32</span> </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Chefs Tips <span class="badge badge-primary badge-pill">48</span>
                        </li>
                    </ul>
                </div>
                <div class="py-3">
                    <h5 class="font-weight-bold">Brands</h5>
                    <form class="brand">
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Royal Fields <input type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Crasmas Fields <input type="checkbox" checked> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Vegetarisma Farm <input type="checkbox" checked> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Farmar Field Eve <input type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">True Farmar Steve <input type="checkbox"> <span class="check"></span> </label> </div>
                    </form>
                </div>
                <div class="py-3">
                    <h5 class="font-weight-bold">Rating</h5>
                    <form class="rating">
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span>
                            </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input
                                    type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input
                                    type="checkbox"> <span class="check"></span> </label> </div>
                    </form>
                </div>
            </section> <!-- Products Section -->
            <section id="products" class="list-product">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                            <a class="card" href="#">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/cucumber-png/cucumber-png-image-purepng-transparent-png-26.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-md-0 pt-4">
                            <div class="card">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/carrot-png/carrot-mint-with-turmeric-chia-equine-pure-delights-12.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-0 pt-4">
                            <div class="card">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/tomato-png/tomato-bunch-fresh-tomatoes-png-image-pngpix-24.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                            <div class="card">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/grapes-png/grapes-grape-red-transparent-png-stickpng-5.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                            <div class="card">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/cucumber-png/cucumber-png-image-purepng-transparent-png-26.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                            <div class="card">
                                <img class="card-img-top" src="https://www.freepnglogos.com/uploads/watermelon-png/watermelon-gea-products-2.png">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">Product title</h6>
                                    <div class="text-muted description">Space for small product description</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">36.99 USD</div>
                                            <div class="text-muted rebate">48.56</div>
                                        </div>
                                        <div class="btn btn-primary">Buy now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>


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
<script src="../js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        var owl_new = $('#new-product');
        owl_new.owlCarousel({
            loop: false,
            nav: true,
            margin: 10,
            dots: false,

            // navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            navText: ["<div class='nav-btn prev-slide'>&#10094;</div>", "<div class='nav-btn next-slide'>&#10095;</div>"],
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1
                },
                600: {
                    items: 3,
                    slideBy: 3
                },
                960: {
                    items: 4,
                    slideBy: 4
                },
                1200: {
                    items: 4,
                    slideBy: 4
                }
            }
        });


        var owl_hotview = $('.owl-carousel-hotview');
        owl_hotview.owlCarousel({
            loop: false,
            nav: false,
            margin: 10,
            dots: false,

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

        // if ($('.owl-prev').length) {
        //     var prev = $('.owl-prev');
        //     prev.on('click', function () {
        //         $(".owl-carousel-new").trigger('prev.owl.carousel');
        //     });
        // }

        // if ($('.owl-next').length) {
        //     var next = $('.owl-next');
        //     next.on('click', function () {
        //         $(".owl-carousel-new").trigger('next.owl.carousel');
        //     });
        // }
    });
</script>

@endsection
