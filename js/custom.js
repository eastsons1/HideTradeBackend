(function($) {

/*========================================================================
                    Main Slider Carousel
==========================================================================*/
    if ($('.main-slider-carousel').length) {
        $('.main-slider-carousel').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            nav: true,
            autoHeight: true,
            smartSpeed: 500,
			
            autoplay: 6000,
			
			autoplayTimeout:7000,
			
            navText: ['<span class="flaticon-back-5"></span>', '<span class="flaticon-next-7"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                800: {
                    items: 1
                },
                1024: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }



})(window.jQuery);


$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: 6000,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

$(document).ready(function () {

    $('.menu li').click(function () {
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    })
});

$(document).ready(function(){
    $(".nav_icon").click(function(){
      $(".clientsnavigation").toggle(1000);
    });
  });


function openNav() {
  document.getElementById("mySidenav").style.width = "320px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

  
  $(function(){
  $('#marquee-vertical').marquee();   

});
  $(function(){
  $('#marquee-founder').marquee();   

});

