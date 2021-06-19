<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->template->title->default("Default title"); ?></title>

    <meta name="description" content="<?php echo $this->template->description; ?>">
    <meta name="Rumah Media" content="">
    <?php echo $this->template->meta; ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/public/images/logo.png"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-core-css.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-simple.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php echo $this->template->stylesheet; ?>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>/public/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/koepoekoepoelike.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.smartmenus.min.js"></script>

    <!-- or -->
    <?php echo $this->template->javascript; ?>
    <script>
        function changeArrow(elm) {
            if ($(".panel-title span").not($(elm).find("span")).is(".glyphicon-chevron-down")) {
                $(".panel-title span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
            }
            $(elm).find("span").toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
        }
    </script>
</head>
<body>
<?php
// This is the main content partial
echo $this->template->header;

echo $this->template->content;

echo $this->template->footer;

?>
<button id="likeModalToggle" data-toggle="modal" data-target="#likeModal" class="hidden"></button>
<div id="likeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body text-center" id="likeNotification">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
<div id="SEARCHMODAL" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search Dialog</h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('.sosmed-share').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
        $('#main-menu').smartmenus();
    });
</script>
</html>