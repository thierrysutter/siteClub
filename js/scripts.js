$(document).ready(function() {
    $(".single-item").slick({
        dots: !0,
        infinite: !0,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    }), 
    $(".multiple-items").slick({
        dots: !0,
        infinite: !0,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1
    }), 
    $(".one-time").slick({
        dots: !0,
        infinite: !1,
        placeholders: !1,
        speed: 300,
        slidesToShow: 5,
        touchMove: !1,
        slidesToScroll: 1
    }), 
    $(".uneven").slick({
        dots: !0,
        infinite: !0,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4
    }), 
    $(".responsive").slick({
        dots: !0,
        infinite: !1,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: !0,
                dots: !0
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), 
    $(".center").slick({
        centerMode: !0,
        infinite: !0,
        centerPadding: "60px",
        slidesToShow: 1,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: !1,
                centerMode: !0,
                centerPadding: "40px",
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: !1,
                centerMode: !0,
                centerPadding: "40px",
                slidesToShow: 1
            }
        }]
    }), 
    $(".lazy").slick({
        lazyLoad: "ondemand",
        slidesToShow: 1,
        slidesToScroll: 1
    }), 
    $(".autoplay").slick({
        dots: !1,
        infinite: !0,
        speed: 200,
        slidesToShow: 12,
        slidesToScroll: 1,
        autoplay: !0,
        autoplaySpeed: 2e3,
        arrows: !1
    }), 
    $(".autoplay8").slick({
        dots: !1,
        infinite: !0,
        speed: 200,
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: !0,
        autoplaySpeed: 3e3,
        arrows: !1
    }), 
    $(".fade").slick({
        dots: !0,
        infinite: !0,
        speed: 500,
        fade: !0,
        slide: "div",
        cssEase: "linear"
    }), 
    $(".add-remove").slick({
        dots: !0,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    
    var e = 1;
    $(".js-add-slide").on("click", function() {
        e++, $(".add-remove").slickAdd("<div><h3>" + e + "</h3></div>")
    }), $(".js-remove-slide").on("click", function() {
        $(".add-remove").slickRemove(e - 1), 0 !== e && e--
    }), $(".filtering").slick({
        dots: !0,
        slidesToShow: 4,
        slidesToScroll: 4
    });
    
    var s = !1;
    $(".js-filter").on("click", function() {
        s === !1 ? ($(".filtering").slickFilter(":even"), $(this).text("Unfilter Slides"), s = !0) : ($(".filtering").slickUnfilter(), $(this).text("Filter Slides"), s = !1)
    }), 
    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !1,
        fade: !0,
        asNavFor: ".slider-nav"
    }), 
    $(".slider-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: !0,
        centerMode: !0,
        focusOnSelect: !0
    }), 
    $(window).on("scroll", function() {
        $(window).scrollTop() > 166 ? $(".fixed-header").show() : $(".fixed-header").hide()
    }), 
    $("ul.nav a").on("click", function(e) {
        e.preventDefault();
        var s = $(this).attr("href"),
            i = $(s).offset().top - 48;
        $("body, html").animate({
            scrollTop: i + "px"
        }, 300)
    }), 
    $(".single-item-rtl").slick({
        dots: !0,
        infinite: !0,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: !0
    }), 
    $(".multiple-items-rtl").slick({
        dots: !0,
        infinite: !0,
        slidesToShow: 3,
        slidesToScroll: 3,
        rtl: !0
    })
});
