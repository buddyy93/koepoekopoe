$(document).ready(function () {
    var myNodelist = document.querySelectorAll("p.pages");
    var kategori = $('#kategori').text();
    var index = 0;
    $(document).on('click', '.koepoekoepoe-infinite-btn', function () {
        // var ID = $(this).attr('id');
        $('.koepoekoepoe-loading-btn').toggle();
        $('.koepoekoepoe-infinite-btn').toggle();
        $.ajax({
            type: 'POST',
            url: 'http://www.koepoekoepoe.com/new/products/searchproductby/' + myNodelist[index].innerHTML +'/'+kategori,
            // data:'id='+ID,
            success: function (html) {
                $('.koepoekoepoe-loading-btn').toggle();
                $('.koepoekoepoe-infinite-btn').toggle();
                $('.for-infinite').append(html);
                $('.owl-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: ["<span></span>", "<span></span>"],
                    touchDrag: false,
                    mouseDrag: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false,
                            touchDrag: true,
                            mouseDrag: true
                        },
                        600: {
                            items: 4,
                            nav: false,
                            touchDrag: true,
                            mouseDrag: true
                        },
                        1000: {
                            items: 4,
                            nav: false,
                            loop: false
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