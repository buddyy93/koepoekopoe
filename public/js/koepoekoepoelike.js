$(document).ready(function () {

    $(document).on('click', '.like-btn', function () {
        var id = $(this).find('span').text();
        var type = $('#type').text();
        $.ajax({
            type: 'POST',
            url: 'http://www.koepoekoepoe.com/new/main/like/' + id+'/'+type,
            // data:'id='+ID,
            success: function (html) {
                $('#likeNotification').text('');
                $('#likeNotification').append(html);
                $('#likeModalToggle').click();
            }
        });
    });
});