<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner">
        <img class="products-x-recipes-banner" height="300px" width="100%"
             src="<?php echo base_url(); ?>/public/images/slide_resep.jpg">
        <div class="koepoekoepoe-banner-content">
            <div class="recipes-borderleft">
                <?php
                if ($this->session->lang === "en")
                {
                    echo ' <h1 class="visible-lg visible-md">Our recipes</h1>
                <h2 class="visible-sm visible-xs">Our recipes</h2>
                <p class="visible-lg visible-md">An delicious and yummy recipes from KoepoeKoepoe</p>';
                }
                else{
                    echo ' <h1 class="visible-lg visible-md">Resep Kita</h1>
                <h2 class="visible-sm visible-xs">Resep Kita</h2>
                <p class="visible-lg visible-md">Resep yang enak dan lezat dari KoepoeKoepoe</p>';
                }
                ?>

            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-md-8 text-center">
            <h4>FILTER BY :</h4>
            <br>
            <div class="visible-lg visible-md">
                <a href="<?php echo base_url() ?>recipes" class="btn-lg btn-round-lg btn-recipe"
                   style="color: black; text-decoration: none;outline: none"><?php echo ($this->session->lang === "en"?"All Recipes":"Semua Resep") ?></a>
                <?php
                $index = 1;
                foreach ($resep_kategori as $kategori)
                {
                    echo '<a href="' . base_url() . 'recipes/by/' . $kategori->ID_RESEP_KATEGORI . '" class="btn-lg btn-round-lg btn-recipe" style="color:black; text-decoration:none;outline: none">' . ($this->session->lang === "en"?$kategori->EN_NAMA_RESEP_KATEGORI:$kategori->NAMA_RESEP_KATEGORI) . '</a>';
                    $index++;
                    if($index==4)
                        echo '<hr>';
                    else if($index>4)
                        $index = 0;
                }
                ?>
            </div>
            <div class="visible-sm visible-xs">
                <div class="dropdown">
                    <button class="btn-lg btn-round-lg btn-recipe" type="button" data-toggle="dropdown"
                            style="width: 80%;outline: none"><?php
                        if(isset($nama_kategori))
                            echo ($this->session->lang === "en"?$nama_kategori->EN_NAMA_RESEP_KATEGORI:$nama_kategori->NAMA_RESEP_KATEGORI);
                        else
                            echo 'All Eecipes';?>
                        <span class="pull-right fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu" style="width: 80%;position: absolute;margin-left: 10%;margin-right: 10%;">
                        <li><a href="<?php echo base_url() ?>recipes/"><?php echo ($this->session->lang === "en"?"All Recipes":"Semua Resep") ?></a></li>
                        <?php
                        foreach ($resep_kategori as $kategori)
                        {
                            echo '<li><a href="' . base_url() . 'recipes/by/' . $kategori->ID_RESEP_KATEGORI . '">' . ($this->session->lang === "en"?$kategori->EN_NAMA_RESEP_KATEGORI:$kategori->NAMA_RESEP_KATEGORI) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <br><br>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <h4>SORT BY :</h4>
            <div class="visible-lg visible-md">
                <div class="dropdown">
                    <button class="btn-lg btn-round-lg btn-recipe" type="button" data-toggle="dropdown"
                            style="width: 80%;outline: none"><?php
                        if(empty($this->session->order)||$this->session->order=='DESC')
                            echo 'NEWEST TO OLDEST';
                        else
                            echo 'OLDEST TO NEWEST';?>
                        <span class="pull-right fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu" style="width: 80%;position: absolute;margin-left: 10%;margin-right: 10%;">
                        <li><a href="<?php echo base_url() ?>recipes/order/0">NEWEST TO OLDEST</a></li>
                        <li><a href="<?php echo base_url() ?>recipes/order/1">OLDEST TO NEWEST</a></li>
                    </ul>
                </div>
            </div>
            <div class="visible-sm visible-xs">
                <div class="dropdown">
                    <button class="btn-lg btn-round-lg btn-recipe" type="button" data-toggle="dropdown"
                            style="width: 80%;outline: none"><?php
                        if(empty($this->session->order)||$this->session->order=='DESC')
                            echo 'NEWEST TO OLDEST';
                        else
                            echo 'OLDEST TO NEWEST';?>
                        <span class="pull-right fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu" style="width: 80%;position: absolute;margin-left: 10%;margin-right: 10%;">
                        <li><a href="<?php echo base_url() ?>recipes/order/0">NEWEST TO OLDEST</a></li>
                        <li><a href="<?php echo base_url() ?>recipes/order/1">OLDEST TO NEWEST</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container for-infinite-parent">
    <div class="for-infinite">
        <?php
        if ($recipes)
        {
            if (sizeof($recipes) == 1)
            {
                echo '<div class="owl-carousel owl-theme text-center">';
                echo '<div>';
                echo '<img src="' . base_url() . 'uploads/' . $recipes[0]->RFOTO . '" style="padding:0px">';
                echo '<div class="caption">';
                echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang === "en"?$recipes[0]->EN_NAMA_RESEP_KATEGORI:$recipes[0]->NAMA_RESEP_KATEGORI) . '</button>';
                echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: -70px;top: 30px;">
                <li style="display:inline;"><a href="#" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="#" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_ig.png"></a></li>
                <li style="display:inline;"><a href="#" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a href="#" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">'.$recipe->ID_RESEP.'</span></button>
                </div>';
                echo '<h2>' . ($this->session->lang === "en" ? $recipes[0]->EN_NAMA_RESEP : $recipes[0]->NAMA_RESEP) . '</h2>';
                echo '<a href="' . base_url() . 'recipes/details/' . $recipes[0]->ID_RESEP . '" style="color: white;"><p><span class="fa fa-long-arrow-right"></span>&nbsp;View recipe</p></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else
            {
                $index = 0;
                $size = sizeof($recipes);
                foreach ($recipes as $recipe)
                {
                    if ($index == 0)
                    {
                        echo '<div class="owl-carousel owl-theme text-center">';
                        echo '<div>';
                        echo '<img src="' . base_url() . 'uploads/' . $recipe->RFOTO . '" style="padding:0px;">';
                        echo '<div class="caption">';
                        echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang === "en"?$recipe->EN_NAMA_RESEP_KATEGORI:$recipe->NAMA_RESEP_KATEGORI) . '</button>';
                        echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: -70px;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">'.$recipe->ID_RESEP.'</span></button>
                </div>';
                        echo '<h2>' . ($this->session->lang === "en" ? $recipe->EN_NAMA_RESEP : $recipe->NAMA_RESEP) . '</h2>';
                        echo '<a href="' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color: white;"><p><span class="fa fa-long-arrow-right"></span>&nbsp;View recipe</p></a>';
                        echo '</div>';
                        echo '</div>';
                        ++ $index;
                        if ($recipes[$size - 1] == $recipe)
                            echo '</div>';
                    } else if ($index < 3)
                    {
                        echo '<div>';
                        echo '<img src="' . base_url() . 'uploads/' . $recipe->RFOTO . '" style="padding:0px;">';
                        echo '<div class="caption">';
                        echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang === "en" ? $recipe->EN_NAMA_RESEP_KATEGORI : $recipe->NAMA_RESEP_KATEGORI) . '</button>';
                        echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: -70px;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url='.base_url().'recipes/details/'.$recipe->ID_RESEP.'" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">'.$recipe->ID_RESEP.'</span></button>
                </div>';
                        echo '<h2>' . ($this->session->lang === "en" ? $recipe->EN_NAMA_RESEP : $recipe->NAMA_RESEP) . '</h2>';
                        echo '<a href="' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color: white;"><p><span class="fa fa-long-arrow-right"></span>&nbsp;View recipe</p></a>';
                        echo '</div>';
                        echo '</div>';
                        ++ $index;
                        if ($index > 2)
                        {
                            echo '</div><hr>';
                            $index = 0;
                        }
                    }
                }
            }
        } else
        {
            echo '<h3 class="text-center">Sorry the recipes are currently not available</h3>';
        }
        ?>
    </div>
</div>
<hr>
<?php
if ($pages>1)
{
    echo '<div class="text-center">
    <button class="btn koepoekoepoe-red btn-round koepoekoepoe-infinite-btn">LOAD MORE</button>
    <button class="btn koepoekoepoe-red btn-round koepoekoepoe-loading-btn" style="display: none"><i class="fa fa-circle-o-notch fa-spin"></i> Retrieving</button>

</div>';
}
?>
<hr>
</div>
<script>
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
                items: 3,
                nav: false,
                touchDrag: true,
                mouseDrag: true
            },
            1000: {
                items: 3,
                nav: false,
                loop: false
            }
        }
    });
</script>
<div style="display: none">
    <?php
    for ($i = 1; $i < $pages; $i ++)
    {
        echo '<p class="pages">' . $i . '</p>';
    }
    ?>
    <p id="kategori"><?php if($recipes) echo $recipes[0]->ID_RESEP_KATEGORI?></p>
</div>
<p id="type" class="hidden">resep</p>
