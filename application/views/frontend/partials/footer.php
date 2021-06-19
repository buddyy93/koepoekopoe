<footer>
    <div class="text-center">
        <?php

        if($this->session->lang==="en")
        { ?>
        <div class="visible-lg visible-md visible-sm">
            <h1 style="font-size: 3em">Want more updates from us?</h1>
            <p style="font-size: medium">Sign-up to our newsletter to get our latest deals to your inbox</p>
        </div>
        <div class="visible-xs">
            <h1 style="font-size: 2em">Want more<br>updates from us?</h1>
            <p style="font-size: medium">Sign-up to our newsletter to get our latest deals to your inbox</p>
        </div>
        <?php }
        else{ ?>
        <div class="visible-lg visible-md visible-sm">
            <h1 style="font-size: 3em">Ingin update dari kita?</h1>
            <p style="font-size: medium">Daftarkan email anda untuk mendapatkan penawaran terbaru langsung ke kotak masuk anda</p>
        </div>
        <div class="visible-xs">
            <h1 style="font-size: 3em">Ingin update dari kita?</h1>
            <p style="font-size: medium">Daftarkan email anda untuk mendapatkan penawaran terbaru langsung ke kotak masuk anda</p>
        </div>
        <?php }?>
        <hr>
        <form class="form-inline visible-lg visible-md visible-sm" role="form" method="post"
              action="<?php echo base_url().'main/subscribe' ?>">
            <div class="input-group input-group-lg">
                <input name="email" type="text" class="form-control search-form text-center" placeholder="Email">
                <!--DO NOT NEED TRAILING SLASH "/" As HTML5 FORMS SLASHES ARE NO LONGER REQUIRED--> <span
                    class="input-group-btn"><button type="submit" class="btn koepoekoepoe-red search-btn"
                                                    data-target="#search-form" name="q">Subscribe</button></span>
            </div>

        </form>
        <form class="form-inline visible-xs" role="form" method="post" action="<?php echo base_url().'main/subscribe' ?>">
            <div class="input-group input-group-lg visible-xs">
                <input name="email" style="border-radius: 30px" type="text" class="form-control search-form text-center"
                       placeholder="Email">
                <!--DO NOT NEED TRAILING SLASH "/" As HTML5 FORMS SLASHES ARE NO LONGER REQUIRED-->
                <button type="submit" class="btn-lg koepoekoepoe-red btn-round-lg" style="width:100%; margin-top: 10px"
                        name="q">Subscribe
                </button>
            </div>
        </form>
        <hr>
    </div>
    <div class="container">
        <div class="divider"></div>
        <hr>
        <div class="row visible-lg visible-md">
            <div class="col-md-3">
                <h4>About Us</h4>
                <br>
                <p>Our Company</p>
                <p>Our commitment</p>
                <p>Careers</p>
                <p>FAQs</p>
                <p>News / Events</p>
                <br>
                <h4>Recipes</h4>
                <br>
                <?php
                    foreach ($resep_kategori as $kategori)
                    {
                        echo '<p><a href="'.base_url().'recipes/by/'.$kategori->ID_RESEP_KATEGORI.'">'.$kategori->NAMA_RESEP_KATEGORI.'</a></p>';
                    }
                ?>
            </div>
            <div class="col-md-3">
                <h4>Other Brands</h4>
                <br>
                <?php
                    foreach ($brands as $brand)
                    {
                        echo '<p><a href="'.base_url().'products/bybrand/'.$brand->ID_BRAND.'">'.$brand->NAMA_BRAND.'</a></p>';
                    }
                ?>
                <br>
                <h4>Products</h4>
                <br>
                <?php
                    foreach ($produk_kategori as $kategori)
                    {
                        echo '<p><a href="'.base_url().'products/by/'.$kategori->ID_PRODUK_KATEGORI.'">'.ucwords(strtolower($kategori->NAMA_PRODUK_KATEGORI)).'</a></p>';
                    }
                ?>
            </div>
            <div class="col-md-3">
                <h4>Spots to eat</h4>
                <br>
                <?php
                    foreach ($lokasis as $lokasi)
                    {
                        echo '<p>'.$lokasi->NAMA_LOKASI.'</p>';
                    }
                ?>
            </div>
            <div class="col-md-3">
                <h4>Get connected with us</h4>
                <br>
                <div>
                    <a target="_blank" href="https://www.facebook.com/KoepoeKoepoeID/">
                        <img src="<?php echo base_url(); ?>/public/images/icon_fb.png">
                        KoepoeKoepoe.id
                    </a>
                </div>
                <br>
                <div>
                    <a target="_blank" href="https://www.instagram.com/koepoekoepoeid/">
                        <img src="<?php echo base_url(); ?>/public/images/icon_ig.png">
                        KoepoeKoepoe.id
                    </a>
                </div>
                <br>
                <div>
                    <a target="_blank" href="https://www.youtube.com/channel/UC7_K3vuZpjrrHbaJYCmMjqg">
                        <img src="<?php echo base_url(); ?>/public/images/icon_ytb.png">
                        KoepoeKoepoe.id
                    </a>
                </div>
            </div>
            <div class="row">
            </div>
            <br>
            <p><b>Because we are constantly improving our products, we encourage you to read the ingredient statement
                    on
                    our packages at the time of your purchase. <br>Copyright &copy; 2017 KoepoeKoepoe. All Rights Reserved.</b>
            </p>
        </div>
        <div class="visible-xs visible-sm text-center mymobileicon-margin">
            <h4>Get Connected with us</h4>
            <a target="_blank" href="https://www.facebook.com/KoepoeKoepoeID/"><img src="<?php echo base_url(); ?>/public/images/icon_fb.png"></a>
            <a target="_blank" href="https://www.instagram.com/koepoekoepoeid/"><img src="<?php echo base_url(); ?>/public/images/icon_ig.png"></a>
            <a target="_blank" href="https://www.youtube.com/channel/UC7_K3vuZpjrrHbaJYCmMjqg"><img src="<?php echo base_url(); ?>/public/images/icon_ytb.png"></a>
            <br><br>
        </div>
    </div>
</footer>
