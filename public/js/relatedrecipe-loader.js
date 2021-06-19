$(document).ready(function () {
    var myNodelist = document.querySelectorAll("p.pages");
    var keyproduct = $('#key_product').text();
    var index = 0;
    $(document).on('click', '.koepoekoepoe-infinite-btn', function () {
        $('.koepoekoepoe-loading-btn').toggle();
        $('.koepoekoepoe-infinite-btn').toggle();
        $.ajax({
            type: 'POST',
            url: 'http://www.koepoekoepoe.com/new/recipes/searchrelatedrecipe/' + myNodelist[index].innerHTML +'/'+keyproduct,
            // data:'id='+ID,
            success: function (html) {
                $('.koepoekoepoe-loading-btn').toggle();
                $('.koepoekoepoe-infinite-btn').toggle();
                $('.for-infinite').append(html);
                $('.owl-carousel').owlCarousel({
                    margin: 30,
                    navText: ["<span class='glyphicon glyphicon-chevron-left'></span>", "<span class='glyphicon glyphicon-chevron-right'></span>"],
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: true,
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