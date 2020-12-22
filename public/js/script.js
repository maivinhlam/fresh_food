
$(document).ready(function(){
  $(".owl-carousel").owlCarousel(
    {
      loop: false,
      margin: 10,
      autoplay: false,
      autoplayTimeout: 6000,
      nav: false,
      dots: false,
      autoWidth: false,
      responsive:
      {
        0: { items: 1 },
        575: { items: 2 },
        768: { items: 3 },
        991: { items: 4 },
        1199: { items: 4 }
      }
    }
  );
  
  if ($('.listproduct__button__prev').length) {
    var prev = $('.listproduct__button__prev');
    prev.on('click', function () {
      $(".owl-carousel").trigger('prev.owl.carousel');
    });
  }

  if ($('.listproduct__button__next').length) {
    var next = $('.listproduct__button__next');
    next.on('click', function () {
      $(".owl-carousel").trigger('next.owl.carousel');
    });
  }
});

var slideIndex = 2;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

$(function(){
  $("header").load("header.html"); 
  $("footer").load("footer.html"); 
});

