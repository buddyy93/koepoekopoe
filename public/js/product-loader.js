$(document).ready(function () {
    var myNodelist = document.querySelectorAll("p.pages");
    var index = 0;
    $(document).on('click', '.koepoekoepoe-infinite-btn', function () {
        // var ID = $(this).attr('id');
        $('.koepoekoepoe-loading-btn').toggle();
        $('.koepoekoepoe-infinite-btn').toggle();
        $.ajax({
            type: 'POST',
            url: 'http://www.koepoekoepoe.com/new/products/searchproduct/' + myNodelist[index].innerHTML,
            // data:'id='+ID,
            success: function (html) {
                $('.koepoekoepoe-loading-btn').toggle();
                $('.koepoekoepoe-infinite-btn').toggle();
                $('.for-infinite').append(html);
                $('.owl-carousel').owlCarousel({
                    margin: 30,
                    navText: ["<span></span>", "<span></span>"],
                    mouseDrag: false,
                    touchDrag: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true,
                            mouseDrag: true,
                            touchDrag: true
                        },
                        600: {
                            items: 4,
                            nav: false,
                            mouseDrag: true,
                            touchDrag: true
                        },
                        1000: {
                            items: 4,
                            nav: false,
                        }
                    }
                });
                index++;
                if (index === myNodelist.length)
                    $('.koepoekoepoe-infinite-btn').hide();
            }
        });
    });
});