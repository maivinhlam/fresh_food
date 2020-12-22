<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/basic.css">
  <link rel="stylesheet" href="./css/detail-product.css">
</head>
<body>
  <header></header>
  <div class="hero">
    <img src="./images/detail-product/Bg.png" style="width:100%">
  </div>
  <main class="detail-product container">
      <div class="content">
        <div class="left">
          <div class="product">
            <div class="img">
              <img src="./images/detail-product/img-product.png" alt="" srcset="">
            </div>
            <div class="product__content">
              <div class="star">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <div class="name">Cá hồi bắc âu</div>
              <div class="id">Mã sản phẩm: Fre0001</div>
              <div class="price">250.000 VNĐ</div>
              <div class="description">
                <p>Cá hồi (Salmon) sinh sống dọc các bờ biển tại Bắc Đại Tây Dương (các họ di cư Salmo salar) và Thái Bình Dương (khoảng sáu họ của giống Oncorhynchus),cũng đã từng được đưa tới Hồ lớn ở trên thế giới.</p>
              </div>
              <div class="addToCard">
                <a href="#">Thêm vào giỏ hàng</a>
              </div>
            </div>
          </div>
          <div class="info">
            <i class="title">Thông tin sản phẩm:</i>
            <br>
            Tôi luôn khuyên khách hàng của mình trả thêm tiền cho một sản phẩm chất lượng.<br>
            Với tôi:<br>
            "Cá hồi không phải là loại thực phẩm nên tìm mua dễ dãi, nhất định phải tìm đến những cơ sở uy tín, và tốt nhất ăn cá hồi mổ trong ngày"<br>
            Cá hồi ở CleverFood được nhập khẩu trực tiếp từ Leroy Seafood  Norway. Luôn là công ty dẫn đầu trong ngành nuôi trồng và kinh doanh hải sản, sản phẩm của Leroy hiện đang có mặt trên 100 quốc gia và đạt được tín nhiệm rất cao. Cá hồi của Leroy đã được chứng nhận về:<br>
            + MSC (Marine Stewardshop Council): Đạt tiêu chuẩn đánh bắt bền vững đối với thủy hải sản tự nhiên.<br>
            + Global Gap Aquaculture Standard: Tiêu chuẩn an toàn thực phẩm Global Gap toàn cầu.<br>
            <div class="img">
              <img src="./images/detail-product/Layer 2.png" alt="" srcset="">
            </div>
            <br>
            + Cá hồi (Salmon) sinh sống dọc các bờ biển tại Bắc Đại Tây Dương (các họ di cư Salmo salar) và Thái Bình Dương (khoảng sáu họ của giống Oncorhynchus),cũng đã từng được đưa tới Hồ lớn ở Bắc Mỹ. Cá hồi được sản xuất nhiều trong ngành nuôi trồng thủy sản ở nhiều nơi trên thế giới.<br>
            + Cá hồi có tập tục sinh sản kì lạ,chúng sinh ra ở vùng nước ngọt,di cư ra biến,đến khi trưởng thành lại ngược sông lên thượng nguồn đẻ trứng.Người ta đã chứng minh được cá hồi quay trở lại chính xác nơi nó sinh ra để sinh sản nhờ vào kí ức khứu giác.Trứng cá hồi được đẻ tại những dòng suối nước ngọt thông thường ở nơi có độ cao lớn,nơi nước nguồn tươi sạch.Hành trình của chúng quả thực rất gian nan,cá hồi bị sụt giảm sức khỏe trầm trọng, thường chết sau 2,3 tuần đẻ trứng,chỉ có khoảng 2-4% là có thể quay lại sinh sản lần 2.Đã có nhiều thước phim ghi lại cảnh di cư hoành tráng của cá hồi.<br>

          </div>
          <div class="comment">
            <img src="./images/comment.png" alt="" srcset="">
          </div>
        </div>
        <div class="right" id="sidebar">
        </div>
      </div>
  </main>
  <footer></footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/d056a73058.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <script>
    $(function(){
      $("header").load("header.html");
      $("footer").load("footer.html");
      $("#sidebar").load("sidebar.html");
    });
  </script>
</body>
</html>
