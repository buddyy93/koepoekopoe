<div class="container">
    <hr>
    <div class="text-center">
        <img src="<?php echo base_url(); ?>/public/images/logo.png">
    </div>
    <?php
    if ($this->session->flashdata('error'))
    {
        echo '<div id="errors">';
        echo $this->session->flashdata('error');
        echo '</div>';
    } else
    {
        ?>
    <div class="text-center">
        <h1>Thanks for subscribing</h1>
        <p>You will receive our best deals directly into your inbox when it's available</p>
    </div>
    <?php } ?>
</div>
<hr>
<footer>
    <div class="container">
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
                <p>Appetizers</p>
                <p>Main Course</p>
                <p>Dessert</p>
            </div>
            <div class="col-md-3">
                <h4>Other Brands</h4>
                <br>
                <p>Koepoe Koepoe</p>
                <p>Dua Belibis</p>
                <br>
                <h4>Products</h4>
                <br>
                <p>Herb &amp; Spices</p>
                <p>Seeds</p>
                <p>Food Enhancer</p>
                <p>Baking Mix</p>
                <p>Food Flavouring</p>
                <p>Food Colouring</p>
                <p>Powdered Food Coloring</p>
            </div>
            <div class="col-md-3">
                <h4>Spots to eat</h4>
                <br>
                <p>Jakarta</p>
                <p>Bandung</p>
                <p>Bali</p>
                <p>Semarang</p>
                <p>Yogyakarta</p>
                <p>Makassar</p>
                <p>Surabaya</p>
                <p>Medan</p>
                <p>Palembang</p>
                <p>Lampung</p>
                <p>Lihat semua</p>
            </div>
            <div class="col-md-3">
                <h4>Get connected with us</h4>
                <br>
                <div>
                    <a href="https://www.facebook.com/KoepoeKoepoeID/">
                        <img src="<?php echo base_url(); ?>/public/images/icon_fb.png">
                        KoepoeKoepoe.id
                    </a>
                </div>
                <br>
                <div>
                    <a href="https://www.instagram.com/koepoekoepoeid/">
                        <img src="<?php echo base_url(); ?>/public/images/icon_ig.png">
                        KoepoeKoepoe.id
                    </a>
                </div>
                <br>
                <div>
                    <a href="https://www.youtube.com/channel/UC7_K3vuZpjrrHbaJYCmMjqg">
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
            <a href="https://www.facebook.com/KoepoeKoepoeID/"><img src="<?php echo base_url(); ?>/public/images/icon_fb.png"></a>
            <a href="https://www.instagram.com/koepoekoepoeid/"><img src="<?php echo base_url(); ?>/public/images/icon_ig.png"></a>
            <a href="https://www.youtube.com/channel/UC7_K3vuZpjrrHbaJYCmMjqg"><img src="<?php echo base_url(); ?>/public/images/icon_ytb.png"></a>
            <br><br>
        </div>
    </div>
</footer>
