@extends('front_end.layouts.common')

@section('content')
<div class="hero">
    <div class="slide">
      <div class="slideshow-container">

        <div class="mySlides fade">
          <img src="../images/FreshFood.png" style="width:100%">
        </div>

        <div class="mySlides fade">
          <img src="../images/FreshFood.png" style="width:100%">
        </div>

        <div class="mySlides fade">
          <img src="../images/FreshFood.png" style="width:100%">
        </div>

      </div>
      <div class="dots" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot active" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
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
          <i>thực phẩm mới nhất</i>
        </div>
        <div class="icon">
          <img src="../images/leaves.png" alt="">
        </div>
        <div class="listProduct">
          <div class="owl-carousel owl-theme listProduct__carousel">
            <div class="owl-item product">
              <div class="image">
                <img src="../images/img-pro-03.png" alt="">
              </div>
              <div class="content">
                <div class="title">Xà lách</div>
                <div class="price">25.000 VND</div>
                <div class="addToCart">Thêm vào giỏ hàng</div>
              </div>
            </div>
            <div class="owl-item product">
              <div class="image">
                <img src="../images/img-pro-11.png" alt="">
              </div>
              <div class="content">
                <div class="title">Xà lách</div>
                <div class="price">25.000 VND</div>
                <div class="addToCart">Thêm vào giỏ hàng</div>
              </div>
            </div>
            <div class="owl-item product">
              <div class="image">
                <img src="../images/img-pro-05.png" alt="">
              </div>
              <div class="content">
                <div class="title">Xà lách</div>
                <div class="price">25.000 VND</div>
                <div class="addToCart">Thêm vào giỏ hàng</div>
              </div>
            </div>
            <div class="owl-item product">
              <div class="image">
                <img src="../images/img-pro-12.png" alt="">
              </div>
              <div class="content">
                <div class="title">Xà lách</div>
                <div class="price">25.000 VND</div>
                <div class="addToCart">Thêm vào giỏ hàng</div>
              </div>
            </div>
            <div class="owl-item product">
              <div class="image">
                <img src="../images/img-pro-11.png" alt="">
              </div>
              <div class="content">
                <div class="title">Xà lách</div>
                <div class="price">25.000 VND</div>
                <div class="addToCart">Thêm vào giỏ hàng</div>
              </div>
            </div>
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
