<!doctype html>
<html>
<head>
    <title>Content Management System</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/public/images/logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/nestle.css">
    <style>
        .table tbody tr td {
            vertical-align: middle;
        }
    </style>
    <script>
        var siteRoot = '<?php echo base_url() ?>';
    </script>
    <script src="<?php echo base_url(); ?>/public/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>/public/ckfinder/ckfinder.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/alertConfirm.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/jquery.nestable.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/navmenu.js"></script>
    <?php
        $myaccount = $this->myglobal->getLoggedInUser();
    ?>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>/backoffice">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Pengaturan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>manage_pengaturan">Pengaturan Umum</a></li>
                        <li><a href="<?php echo base_url() ?>manage_menumanager">Menu Manager</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Media <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>manage_kategori_produk/">Kategori
                                Produk</a></li>
                        <li><a href="<?php echo base_url(); ?>manage_produk/">Produk</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>manage_kategori_resep/">Kategori Resep</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>manage_resep/">Resep</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>manage_kategori_story/">Kategori Story</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>manage_story/">Story</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>manage_brand/">Brand</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Extras <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() . 'manage_slider' ?>">Slider</a></li>
                        <li><a href="#">Media Sosial</a></li>
                        <li><a href="#">Kontak Email</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="technical-support" href="<?php echo base_url() ?>technical_support">Tehcnical Support</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="directory">Account <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="directory">
                        <li><a tabindex="-1" href="<?php echo base_url().'manage_account/editaccount/'.$myaccount->username ?>">Edit Account</a></li>
                        <li><a tabindex="-1" href="<?php echo base_url() ?>manage_account/">Manage User</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo base_url(); ?>/backoffice/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php
// This is the main content partial
echo $this->template->content;
?>
<hr>
<?php echo $this->template->javascript; ?>
</body>
</html>
