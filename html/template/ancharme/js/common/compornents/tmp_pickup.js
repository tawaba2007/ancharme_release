$(function() {
  $(".pickup_slider").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 300,
    centerMode: false,
    centerPadding: "10%",
    slidesToShow: 3,
    slidesToScroll: 3,
    fade: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      }
    ]
  });
});
