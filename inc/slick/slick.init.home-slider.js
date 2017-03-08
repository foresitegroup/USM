$(document).ready(function(){
  $('.home-slider').slick({
    appendArrows: $('.home-slider'),
    prevArrow: '<a href="#" class="slick-prev"></a>',
    nextArrow: '<a href="#" class="slick-next"></a>',
    dots: true,
    dotsClass: 'home-slider-menu',
    customPaging: function (slider, i) {
      if (i == 0) var title = "CAPITAL";
      if (i == 1) var title = "ENDOWMENT";
      if (i == 2) var title = "USM FUND";
      return title;
    },
    draggable: false,
    responsive: [
      {
        breakpoint: 600,
        // settings: "unslick"
      }
    ]
  });
});