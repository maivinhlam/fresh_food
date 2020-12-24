@extends('front_end.layouts.common')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/basic.css">
  <link rel="stylesheet" href="../css/category-product.css">
</head>

<body>
  <header></header>
  <div class="hero" id="hero">
    <img src="../images/detail-product/Bg.png" style="width:100%">
    <div class="link">
      <a href="#"><i class="fas fa-home"></i>Trang chủ</a>
      <i class="fas fa-chevron-right" style="font-size: 0.7em;"></i>
      <a href="#">Thực Phẩm</a>
    </div>
  </div>
  <main id="categoty-product">
    <div class="container content">
      <div class="header">
        <div class="title">Thực phẩm</div>
        <div class="filter">
          <form action="" method="post">
            <select id="filter">
              <option value="sort">Lọc từ cao đến thấp</option>
              <option value="saab">Saab</option>
              <option value="opel">Opel</option>
              <option value="audi">Audi</option>
            </select>
            <button>Lọc</button>
          </form>
        </div>
      </div>

      <div class="category">
        <div class="listProduct" id="listProduct">
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-03.png" alt="">
            </div>
            <div class="content">
              <div class="title">Xà lách</div>
              <div class="price">25.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-11.png" alt="">
            </div>
            <div class="content">
              <div class="title">Dẻ sường bò Úc</div>
              <div class="price">250.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-05.png" alt="">
            </div>
            <div class="content">
              <div class="title">Nho đen Mỹ</div>
              <div class="price">100.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-12.png" alt="">
            </div>
            <div class="content">
              <div class="title">Ngao Trắng</div>
              <div class="price">75.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>

          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-03.png" alt="">
            </div>
            <div class="content">
              <div class="title">Xà lách</div>
              <div class="price">25.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-11.png" alt="">
            </div>
            <div class="content">
              <div class="title">Dẻ sường bò Úc</div>
              <div class="price">250.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-05.png" alt="">
            </div>
            <div class="content">
              <div class="title">Nho đen Mỹ</div>
              <div class="price">100.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-12.png" alt="">
            </div>
            <div class="content">
              <div class="title">Ngao Trắng</div>
              <div class="price">75.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>

          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-03.png" alt="">
            </div>
            <div class="content">
              <div class="title">Xà lách</div>
              <div class="price">25.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-11.png" alt="">
            </div>
            <div class="content">
              <div class="title">Dẻ sường bò Úc</div>
              <div class="price">250.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-05.png" alt="">
            </div>
            <div class="content">
              <div class="title">Nho đen Mỹ</div>
              <div class="price">100.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
          <a class="product" href="#">
            <div class="image">
              <img src="../images/img-pro-12.png" alt="">
            </div>
            <div class="content">
              <div class="title">Ngao Trắng</div>
              <div class="price">75.000 VND</div>
              <div class="addToCart">Thêm vào giỏ hàng</div>
            </div>
          </a>
        </div>
      </div>
      <div class="pagination">
        <ul>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
      </div>
    </div>
  </main>
  <footer></footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/d056a73058.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <script>
    $(function () {
      $("header").load("header.html");
      $("footer").load("footer.html");
      $("#sidebar").load("sidebar.html");
    });
  </script>
</body>

</html>
@endsection
