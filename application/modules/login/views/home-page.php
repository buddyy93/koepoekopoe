<!doctype html>
<html>
<head>
    <title>Simple Login with CodeIgniter - Private Area</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/dashboard.css">

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
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Pengaturan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Pengaturan Umum</a></li>
                        <li><a href="#">Menu Manager</a></li>
                        <li><a href="#">Top Menu</a></li>
                        <li><a href="#">Shortcut</a></li>
                        <li><a href="#">Shortcut Intro</a></li>
                        <li><a href="#">Shortcut Intro List</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Instansi <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Kategori Instansi</a></li>
                        <li><a href="#">Instansi</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Pegawai</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Aspirasi Masyarakat</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Media <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url().'berita/kategori' ?>">Kategori Berita</a></li>
                        <li><a href="<?php echo base_url().'berita/' ?>">Berita</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Agenda</a></li>
                        <li><a href="#">Pengumuman</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Kategori Artikel</a></li>
                        <li><a href="#">Artikel</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Kategori Wisata</a></li>
                        <li><a href="#">Wisata</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Kategori Potensi</a></li>
                        <li><a href="#">Potensi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Galeri <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Foto</a></li>
                        <li><a href="#">Video</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Transparansi Keuangan</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Download</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Extra <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Popup</a></li>
                        <li><a href="#">Slider</a></li>
                        <li><a href="#">Running Text</a></li>
                        <li><a href="#">Situs Terkait</a></li>
                        <li><a href="#">Media Sosial</a></li>
                        <li><a href="#">Polling</a></li>
                        <li><a href="#">Kontak Email</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Extras <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Polling</a></li>
                        <li><a href="#">Kritik &amp; Saran</a></li>
                        <li><a href="#">Slider</a></li>
                        <li><a href="#">Banner</a></li>
                        <li><a href="#">Media Sosial</a></li>
                        <li><a href="#">Kontak Email</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="background:#00CC00;">
                    <a href="index.php?module=report">Tehcnical Support</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="directory">Account <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="directory">
                        <li><a tabindex="-1" href="index.php?module=account&amp;page=list">Edit Account</a></li>
                        <li><a tabindex="-1" href="index.php?module=user&amp;page=list">Manage User</a></li>						<li class="divider"></li>
                        <li><a tabindex="-1" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row text-center">
        <h2>Dashboard</h2>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-file"></span>Berita</h3>
        </div>
        <div class="panel-body">
            Total Berita : <?php echo $berita ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/public/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>/public/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/public/js/bootstrap-datetimepicker.min.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
</body>
</html>
