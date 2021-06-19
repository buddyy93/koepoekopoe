<div class="mycontainer">
    <nav class="navbar navbar-default img-rounded" style="background: white">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="visible-xs pull-right topsearchicon"><span class="fa fa-search"></span></button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#defaultNavbar1"
                        aria-expanded="false"><span class="sr-only">Toggle navigation</span><span
                            class="icon-bar" style="margin-left: 20%;width: 80%;"></span><span
                            class="icon-bar"></span><span class="icon-bar" style="margin-left:40%; width: 60%;"></span>
                </button>
                <a href="<?php echo base_url(); ?>" class="navbar-left mylogo"><img
                            src="<?php echo base_url(); ?>/public/images/logo.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="defaultNavbar1">
                <ul class="nav navbar-nav mytopnav visible-lg visible-md visible-sm">
                    <?php
                        echo menunavbar();
                    ?>
                </ul>
                <div class="menu-content panel-group visible-xs" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse1">
                            <h4 class="panel-title">
                                <?php echo ($this->session->lang === "en"?"Recipes":"Resep"); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><a href="<?php echo base_url(); ?>recipes">All recipes</a></p>
                                <?php
                                foreach ($resep_kategori as $kategori)
                                {
                                    echo '<p><a href="'.base_url().'recipes/by/'.$kategori->ID_RESEP_KATEGORI.'">'.$kategori->NAMA_RESEP_KATEGORI.'</a></p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse2">
                            <h4 class="panel-title">
                                <?php echo ($this->session->lang === "en"?"Products":"Produk"); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><a href="<?php echo base_url(); ?>products">All Products</a></p>
                                <?php
                                foreach ($produk_kategori as $kategori)
                                {
                                    echo '<p><a href="'.base_url().'products/by/'.$kategori->ID_PRODUK_KATEGORI.'">'.ucwords(strtolower($kategori->NAMA_PRODUK_KATEGORI)).'</a></p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse3">
                            <h4 class="panel-title">
                                <?php echo ($this->session->lang === "en"?"Stories":"Cerita"); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><a href="<?php echo base_url(); ?>stories">All stories</a></p>
                                <?php
                                foreach ($story_kategori as $story)
                                {
                                    echo '<p>'.$story->NAMA_STORY_KATEGORI.'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse4">
                            <h4 class="panel-title">
                                <?php echo ($this->session->lang === "en"?"Spots to eat":"Tempat Makan"); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                foreach ($lokasis as $lokasi)
                                {
                                    echo '<p>'.$lokasi->NAMA_LOKASI.'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse5">
                            <h4 class="panel-title">
                                <?php echo ($this->session->lang === "en"?"Other Brands":"Brand Lain"); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                foreach ($brands as $brand)
                                {
                                    echo '<p><a href="'.base_url().'products/bybrand/'.$brand->ID_BRAND.'">'.$brand->NAMA_BRAND.'</a></p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-heading" onClick="changeArrow(this)" data-toggle="collapse"
                             data-parent="#accordion" href="#collapse6">
                            <h4 class="panel-title">
                                About us<span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Our Company</p>
                                <p>Our commitment</p>
                                <p>Careers</p>
                                <p>FAQs</p>
                                <p>News / Events</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav navbar-right mysocialbtn">
                    <li class="topicon visible-lg visible-md visible-sm">
                        <div style="margin-top: 6px">
                            <a href="<?php echo base_url(); ?>/main/language/id" style="display: inline; text-decoration: none; color: black"><b>ID </b></a> / <a href="<?php echo base_url(); ?>/main/language/en" style="display: inline; text-decoration: none; color: black"><b>EN</b></a>
                        </div>
                    </li>
                    <li class="topicon visible-lg visible-md visible-sm">
                        <button type="button" class="btn btn-default btn-circle btn-search"><i
                                    class="fa fa-search"></i></button>
                    </li>
                    <li class="visible-lg visible-md visible-sm">
                        <a target="_blank" href="https://www.facebook.com/KoepoeKoepoeID/" style="padding-top:10px;">
                            <button class="btn btn-default btn-circle btn-facebook"><i
                                        class="fa fa-facebook"></i></button>
                        </a>
                    </li>
                    <li class="visible-lg visible-md visible-sm">
                        <a target="_blank" href="https://www.instagram.com/koepoekoepoeid/" style="padding-top:10px;">
                            <button type="button" class="btn btn-default btn-circle btn-instagram"><i
                                        class="fa fa-instagram"></i>
                            </button>
                        </a>
                    </li>
                    <div class="visible-xs text-center mymobileicon-margin">
                        <h4><?php echo ($this->session->lang === "en"?"Get connected with us":"Terhubung dengan kita"); ?></h4>
                        <a target="_blank" href="https://www.facebook.com/KoepoeKoepoeID/"><img
                                    src="<?php echo base_url(); ?>/public/images/icon_fb.png"></a>
                        <a target="_blank" href="https://www.instagram.com/koepoekoepoeid/"><img
                                    src="<?php echo base_url(); ?>/public/images/icon_ig.png"></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UC7_K3vuZpjrrHbaJYCmMjqg"><img
                                    src="<?php echo base_url(); ?>/public/images/icon_ytb.png"></a>
                        <hr style="border-top: thin solid black; margin: 10% 5% 5% 5%;">
                        <div class="input-group" style="margin: auto; width: 100%">
                            <a href="<?php echo base_url(); ?>/main/language/id" class="btn" style="background: white; width: 30%">Indonesian</a>
                            <a href="<?php echo base_url(); ?>/main/language/en" class="btn" style="background: black;color: white;width: 30%;">English</a>
                        </div>
                        <br>
                        <p><b>Copyright &copy; 2017 KoepoeKoepoe.<br>All Rights Reserved.</b></p>
                    </div>
                    <li class="visible-lg visible-md"><a href="#">#KOEPOEKOEPOE</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>