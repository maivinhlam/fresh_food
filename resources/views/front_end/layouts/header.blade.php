<head>
  <link rel="stylesheet" href="../css/header.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <a href="/">
        <img src="../images/logo-02.png" alt="" srcset="">
      </a>
    </div>
    <nav>
      <ul>
        <li>
          <a href="#">trang chủ</a>
        </li>
        <li>
          <a href="#">Thịt tươi</a>
        </li>
        <li>
          <a href="#">rau sạch</a>
        </li>
        <li>
          <a href="#">quả ngọt</a>
        </li>
        <li>
          <a href="#">liên hệ</a>
        </li>
        <li>
          <a href="#">thanh toán</a>
        </li>
      </ul>
    </nav>
    <div class="search">
      <a href="#">
        <i class="fas fa-search"></i>
    </a>
    </div>
    <div class="cart">
      <a href="{{ route('cart') }}">
        <i class="fas fa-shopping-cart">
          <span class="badge">{{ $cart_count }}</span>
        </i>
      </a>
    </div>
  </div>
</body>

