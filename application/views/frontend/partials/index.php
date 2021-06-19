<div class="mycontainer container-sm">
    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"></li>
            <?php
            for ($i = 1; $i < sizeof($sliders); $i ++)
            {
                echo '<li data-target="#carousel1" data-slide-to="' . $i . '"></li>';
            }
            ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            if (sizeof($sliders) > 1)
            {
                $index = 0;
                foreach ($sliders as $slider)
                {
                    if ($index == 0)
                        echo '<div class="item active" style="background: url(\'' . base_url() . 'uploads/' . $slider->FOTO . '\') 30%;">';
                    else
                        echo '<div class="item" style="background: url(\'' . base_url() . 'uploads/' . $slider->FOTO . '\') 30%;">';
                    echo '<div class="carousel-caption">';
                    echo '<div style="padding-left: 15%">';
                    IF ($this->session->lang === 'en')
                    {

                        echo '<div class="visible-lg visible-md">' . $slider->EN_HEADING . '</div>';
                        echo '<p class="visible-lg visible-md">' . $slider->EN_DESKRIPSI_SLIDER . '</p>';
                        echo '<div class="visible-sm visible-xs h1-mobile">' . $slider->EN_HEADING . '</div><br>';
                    } else
                    {
                        echo '<div class="visible-lg visible-md">' . $slider->HEADING . '</div>';
                        echo '<p class="visible-lg visible-md">' . $slider->DESKRIPSI_SLIDER . '</p>';
                        echo '<div class="visible-sm visible-xs h1-mobile">' . $slider->HEADING . '</div><br>';
                    }
                    if($this->session->lang === 'en'){
                        echo '<a href="' . $slider->LINK_SLIDER . '"><button class="btn-lg koepoekoepoe-red btn-round-lg visible-lg visible-md visible-sm">GO TO DETAILS</button></a>';
                        echo '<a href="' . $slider->LINK_SLIDER . '"><button class="btn-lg koepoekoepoe-red btn-round-lg visible-xs">GO TO DETAILS</button></a>';
                    }
                    else{
                        echo '<a href="' . $slider->LINK_SLIDER . '"><button class="btn-lg koepoekoepoe-red btn-round-lg visible-lg visible-md visible-sm">LIHAT DETIL</button></a>';
                        echo '<a href="' . $slider->LINK_SLIDER . '"><button class="btn-lg koepoekoepoe-red btn-round-lg visible-xs">LIHAT DETIL</button></a>';
                    }
                    echo '</div></div></div>';
                    $index ++;
                }
            }
            ?>
        </div>
        <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span
                    class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span
                    class="sr-only">Previous</span></a><a
                class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span
                    class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span
                    class="sr-only">Next</span></a>
    </div>
</div>
<hr>
<div class="owl-carousel owl-theme" id="owl-carousel1">
    <?php
    foreach ($stories as $story)
    {
        echo '<div>';
        echo '<div class="col-md-6">';
        echo '<img src="' . base_url() . 'uploads/' . $story->FOTO . '">';
        echo '</div>';
        echo '<div class="col-md-6">';
        if ($this->session->lang === 'en')
        {
            echo '<h4>' . $story->EN_JUDUL_STORY . '</h4>';
            echo '<p>' . substr(strip_tags($story->EN_KONTEN_STORY), 0, 200) . '...</p>';
        } else
        {
            echo '<h4>' . $story->JUDUL_STORY . '</h4>';
            echo '<p>' . substr(strip_tags($story->KONTEN_STORY), 0, 200) . '...</p>';
        }
        echo '<a href="' . base_url() . 'stories/details/' . $story->ID_STORY . '"><span class="fa fa-long-arrow-right">&nbsp;Read more</span></a>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
<hr>
<div class="container-fluid">
    <div class="col-md-7 visible-lg visible-md visible-sm" style="font-size: 130%">
        <h4 class="mymargin-5">Featured Recipes</h4>
        <h1 class="myborderleft">
            Top 15 Koepoe's<br>
            secret recipes
        </h1>
    </div>
    <div class="col-md-7 visible-xs" style="font-size: 80%">
        <h4 class="mymargin-5">Featured Recipes</h4>
        <h1 class="myborderleft">
            Top 15 Koepoe's<br>
            secret recipes
        </h1>
    </div>
    <div class="col-md-5 visible-lg" style="font-size: 150%; padding-right: 5%">
        <h5>Featured Recipe</h5>
        <p><?php echo '<a href="' . base_url() . 'recipes/details/' . $recipes[0]->ID_RESEP . '">' . $recipes[0]->NAMA_RESEP ?>
            <span class="fa fa-long-arrow-right fa-pull-right"></span></a></p>
        <h5>Featured Recipe</h5>
        <p><?php echo '<a href="' . base_url() . 'recipes/details/' . $recipes[1]->ID_RESEP . '">' . $recipes[1]->NAMA_RESEP ?>
            <span class="fa fa-long-arrow-right fa-pull-right"></span></a></p>
        <h5>Featured Recipe</h5>
        <p><?php echo '<a href="' . base_url() . 'recipes/details/' . $recipes[2]->ID_RESEP . '">' . $recipes[2]->NAMA_RESEP ?>
            <span class="fa fa-long-arrow-right fa-pull-right"></span></a></p>
    </div>
</div>
<hr>
<div class="owl-carousel owl-theme text-center" id="owl-carousel3">
    <?php
    foreach ($recipes as $recipe)
    { ?>
        <div>
            <img src="<?php echo base_url() . 'uploads/' . $recipe->RFOTO; ?>" style="padding: 0px">
            <div class="caption">
                <button class="btn btn-round btn-transparent"><?php echo $recipe->NAMA_RESEP_KATEGORI ?></button>
                <?php
                echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: 20px;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">'.$recipe->ID_RESEP.'</span></button>
                </div>';
                ?>
                <?php
                if ($this->session->lang === "en")
                {
                    echo '<h2>' . $recipe->EN_NAMA_RESEP . '</h2>';
                    echo '<a href="' . base_url() . "recipes/details/" . $recipe->ID_RESEP . '" style="color: white;">
                    <p><span class="fa fa-long-arrow-right"></span>&nbsp;View recipe</p></a>';
                } else
                {
                    echo '<h2>' . $recipe->NAMA_RESEP . '</h2>';
                    echo '<a href="' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color: white;">
                    <p><span class="fa fa-long-arrow-right"></span>&nbsp;Lihat resep</p></a>';
                }
                ?>
            </div>
        </div>
    <?php }
    ?>
</div>
<hr>
<div class="text-center">
    <a href="<?php echo base_url() . 'recipes' ?>">
        <?php
        if ($this->session->lang === "en")
            echo '<button class="btn koepoekoepoe-red btn-round">VIEW ALL RECIPES</button>';
        else
            echo '<button class="btn koepoekoepoe-red btn-round">LIHAT SEMUA RESEP</button>';
        ?>
    </a>
</div>
<hr>
<h1 class="text-center">Featured Products</h1>
<div class="owl-carousel owl-theme text-center" id="owl-carousel2">
    <?php
    foreach ($products as $product)
    { ?>
        <div>
            <a href="<?php echo base_url() . 'products/details/' . $product->ID_PRODUK ?>"><img
                        src="<?php echo base_url() . 'uploads/' . $product->FOTO; ?>"></a>
            <?php
            if ($this->session->lang === "en")
                echo '<h4>' . $product->EN_NAMA_PRODUK . '</h4>';
            else
                echo '<h4>' . $product->NAMA_PRODUK . '</h4>';
            ?>
        </div>
    <?php }
    ?>
</div>
<hr>
<div class="text-center">
    <a href="<?php echo base_url() . 'products' ?>">
        <?php
        if ($this->session->lang === "en")
            echo '<button class="btn koepoekoepoe-red btn-round">VIEW ALL PRODUCTS</button>';
        else
            echo '<button class="btn koepoekoepoe-red btn-round">LIHAT SEMUA PRODUK</button>';
        ?>
    </a>
</div>
<hr>
</div>
<div class="thumbnail text-center">
    <img width="100%" style="height: 400px" src="<?php echo base_url(); ?>/public/images/menu-footer.jpg" alt=""
         class="img-responsive visible-lg">
    <img width="100%" src="<?php echo base_url(); ?>/public/images/menu-footer.jpg" alt=""
         class="img-responsive visible-xs visible-md visible-sm">
    <div class="caption-bottom">
        <div class="text-center" style="width:90%;margin: auto">
            <div class="mybordertop"></div>
            <?php
            if ($this->session->lang === "en")
            {
                echo '<div class="visible-lg visible-md visible-sm">
                <h1 style="font-size:4em; margin-top: 0">Spots to eat</h1>
                <p>Check out our best destinations and find a new favorite destination</p>
            </div>
            <div class="visible-xs">
                <h2 style="margin-top: 0">Spots to eat</h2>
                <p>Check out our best destinations and find a new favorite destination</p>
            </div>
            <button style="margin:auto"
                    class="btn btn-lg koepoekoepoe-red btn-round-lg visible-lg visible-md visible-sm">VIEW
                DETAILS
            </button>
            <button style="border-radius: 30px;
width:50%; margin:auto; padding: 2% 0%" class="btn btn-sm koepoekoepoe-red btn-round-sm visible-xs">VIEW DETAILS
            </button>';
            }
            else{
                echo '<div class="visible-lg visible-md visible-sm">
                <h1 style="font-size:4em; margin-top: 0">Tempat makan</h1>
                <p>Cari tau destinasi terbaik kita dan temukan destinasi favorit kamu yang baru</p>
            </div>
            <div class="visible-xs">
                <h2 style="margin-top: 0">Tempat makan</h2>
                <p>Cari tau destinasi terbaik kita dan temukan destinasi favorit kamu yang baru</p>
            </div>
            <button style="margin:auto"
                    class="btn btn-lg koepoekoepoe-red btn-round-lg visible-lg visible-md visible-sm">LIHAT DETIL
            </button>
            <button style="border-radius: 30px;
width:50%; margin:auto; padding: 2% 0%" class="btn btn-sm koepoekoepoe-red btn-round-sm visible-xs">LIHAT DETIL
            </button>';
            }
            ?>
        </div>
    </div>
</div>
<p id="type" class="hidden">resep</p>
<script>
    $('#owl-carousel1').owlCarousel({
        margin: 10,
        autoplay: 5000,
        navText: ["<span class='glyphicon glyphicon-chevron-left'></span>", "<span class='glyphicon glyphicon-chevron-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 2,
                nav: true,
            }
        }
    });
    $('#owl-carousel2').owlCarousel({
        loop: true,
        margin: 10,
        navText: ["<span class='glyphicon glyphicon-chevron-left'></span>", "<span class='glyphicon glyphicon-chevron-right'></span>"],
        autoplay: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: false
            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });
    $('#owl-carousel3').owlCarousel({
        loop: true,
        margin: 20,
        navText: ["<span class='glyphicon glyphicon-chevron-left'></span>", "<span class='glyphicon glyphicon-chevron-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: false
            },
            600: {
                items: 3,
                nav: true
            },
            1000: {
                items: 3,
                nav: true,
                loop: true
            }
        }
    });
</script>