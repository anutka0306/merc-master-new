jQuery(function($) {
    $(window).scroll(function(){
        if($(this).scrollTop()>100){
            $('.container_nav__fixed').addClass('show_block');
        }
        else if ($(this).scrollTop()<100){
            $('.container_nav__fixed').removeClass('show_block');
        }
    });
});

$(document).ready(function () {

    //placeholder на формах
    $('input#phoneN2').hover(function (){
        $(this).attr('placeholder', '+7-___-___-__-__');
    },
        function (){
            $(this).attr('placeholder', '');
        });

    $('input#phoneN3').hover(function (){
            $(this).attr('placeholder', '+7-___-___-__-__');
        },
        function (){
            $(this).attr('placeholder', '');
        });
    $('input#phoneN4').hover(function (){
            $(this).attr('placeholder', '+7-___-___-__-__');
        },
        function (){
            $(this).attr('placeholder', '');
        });

    $('.brands__list_slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.nashiraboty__gallery').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },

            {
                breakpoint: 880,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    $('.slick__main').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
    });

});