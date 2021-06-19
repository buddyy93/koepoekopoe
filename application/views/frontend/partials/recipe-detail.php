<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner printThis">
        <img class="content-banner" height="500px" width="100%"
             src="<?php echo base_url(); ?>/uploads/<?php echo $resep->KFOTO ?>">
        <div class="koepoekoepoe-banner-content">

        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row koepoekoepoe-content" id="theRecipe">
            <div class="col-md-8 printThis">
                <a href="<?php echo base_url() . 'recipes/by/' . $resep->ID_RESEP_KATEGORI ?>"
                   class="btn btn-round btn-content"><?php echo $resep->NAMA_RESEP_KATEGORI ?></a>
                <br>
                <?php
                if ($this->session->lang === "en")
                {
                    echo '<h3>' . $resep->EN_NAMA_RESEP . '</h3>';
                    echo '<p>' . $resep->EN_DESKRIPSI_RESEP . '</p>';
                } else
                {
                    echo '<h3>' . $resep->NAMA_RESEP . '</h3>';
                    echo '<p>' . $resep->DESKRIPSI_RESEP . '</p>';
                }
                ?>
                <div class="visible-sm visible-xs">
                    <table class="table text-center">
                        <tbody>
                        <tr>
                            <td>
                                <h3><?php echo $resep->PREP_TIME ?></h3>
                                <p>Prep Time</p>
                            </td>
                            <td>
                                <h3><span class="fa fa-clock-o"></span><?php echo $resep->COOK_TIME ?></h3>
                                <p>Cook time</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3><?php echo $resep->KALORI ?></h3>
                                <p>Calories</p>
                            </td>
                            <td>
                                <h3><?php echo $resep->JUMLAH_INGREDIENT ?></h3>
                                <p>Ingredients</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Ingredients</h4>
                    <div class="recipe-ingredients">
                        <?php echo($this->session->lang === "en" ? $resep->EN_INGREDIENT_RESEP : $resep->INGREDIENT_RESEP) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 visible-lg visible-md">
                        <h4>Ingredients</h4>
                        <div class="recipe-ingredients">
                            <?php echo($this->session->lang === "en" ? $resep->EN_INGREDIENT_RESEP : $resep->INGREDIENT_RESEP) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Key product</h4>
                        <div class="text-center">
                            <a href="<?php echo base_url() . 'products/details/' . $key_product->ID_PRODUK ?>">
                                <img width="200px" height="200px"
                                     src="<?php echo base_url() . "uploads/" . $key_product->PFOTO; ?>"></a>
                            <br>
                            <h5><?php echo($this->session->lang === "en" ? $key_product->EN_NAMA_PRODUK : $key_product->NAMA_PRODUK) ?></h5>
                        </div>
                    </div>
                </div>
                <br>
                <h4>How to cook</h4>
                <div class="table-responsive">
                    <table class="table how-to-table">
                        <tbody>
                        <?php
                        $index = 1;
                        $steps = $this->session->lang === "en" ? $resep->EN_HOW_TO_COOK : $resep->HOW_TO_COOK;
                        foreach (explode('</p>', $steps, - 1) as $step)
                        { ?>
                            <tr>
                                </td>
                                <td style="color: black">
                                    <h3><?php echo $index ?></h3>
                                <td style="color: black">
                                    <?php echo $step ?>
                                </td>
                            </tr>
                            <?php $index ++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="visible-lg visible-md" id="commentSection">
                    <h3>Leave a comment</h3>
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=89533811750";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-comments"
                         data-href="https://beritabali.com/read/2017/12/04/201712040008/Modus-Penyelundupan-Baru-Ayam-Ilegal-Dibungkus-Plastik-Kemudian-Dimasukan-Tas.html"
                         data-num-posts="20" data-width="100%">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <table class="table text-center visible-lg visible-md">
                    <tbody>
                    <tr>
                        <td>
                            <h3><?php echo $resep->PREP_TIME ?></h3>
                            <p>Prep Time</p>
                        </td>
                        <td>
                            <h3><span class="fa fa-clock-o"></span><?php echo $resep->COOK_TIME ?></h3>
                            <p>Cook time</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><?php echo $resep->KALORI ?></h3>
                            <p>Calories</p>
                        </td>
                        <td>
                            <h3><?php echo $resep->JUMLAH_INGREDIENT ?></h3>
                            <p>Ingredients</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="visible-lg visible-md">
                    <a href="<?php echo base_url() . 'recipes/generatePdf/' . $resep->ID_RESEP ?>">
                        <button class="btn-lg btn-round-lg form-control btn-koepoe-action"><span
                                    class="fa fa-heart-o"></span>&nbsp;SAVE
                            THIS RECIPE
                        </button>
                    </a>
                    <button class="btn-lg btn-round-lg form-control btn-koepoe-action" onclick="printRecipe()"><span
                                class="fa fa-print"></span>&nbsp;PRINT
                        THIS RECIPE
                    </button>
                    <button class="btn-lg btn-round-lg form-control btn-koepoe-action" data-toggle="modal"
                            data-target="#shareModal"><span
                                class="fa fa-share-alt	"></span>&nbsp;SHARE THIS RECIPE
                    </button>
                </div>

                <div class="visible-sm visible-xs">
                    <br>
                    <button class="btn-lg btn-round-lg form-control btn-koepoe-action" onclick="saveRecipe()"><span
                                class="fa fa-heart-o"></span>&nbsp;SAVE
                        THIS RECIPE
                    </button>
                    <button class="btn-lg btn-round-lg form-control btn-koepoe-action" onclick="printRecipe()"><span
                                class="fa fa-print"></span>&nbsp;PRINT
                        THIS RECIPE
                    </button>
                    <button class="btn-lg btn-round-lg form-control btn-koepoe-action" data-toggle="modal"
                            data-target="#shareModal"><span
                                class="fa fa-share-alt"></span>&nbsp;SHARE THIS RECIPE
                    </button>
                    <br>
                    <h4>Leave a comment</h4>
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=89533811750";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-comments"
                         data-href="https://beritabali.com/read/2017/12/04/201712040008/Modus-Penyelundupan-Baru-Ayam-Ilegal-Dibungkus-Plastik-Kemudian-Dimasukan-Tas.html"
                         data-num-posts="20" data-width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container recipes-sm-containere" style="padding-left: 0;padding-right: 0;">
    <hr>
    <h3 class="visible-lg visible-md">Related recipes</h3>
    <h3 class="visible-sm visible-xs" style="margin: 5%;">Related recipes</h3>
    <?php
    if (isset($related_recipe))
    {
    ?>
    <div class="for-infinite-parent">
        <div class="for-infinite">
            <div class="owl-carousel owl-theme text-center" id="relatedrecipes">
                <?php
                foreach ($related_recipe as $recipe)
                {
                    echo '<div>';
                    echo '<img src="' . base_url() . 'uploads/' . $recipe->RFOTO . '" style="padding:0px">';
                    echo '<div class="caption">';
                    echo '<a href="' . base_url() . 'recipes/by/' . $recipe->ID_RESEP_KATEGORI . '" class="btn btn-round btn-transparent" style="color:white;">' . $recipe->NAMA_RESEP_KATEGORI . '</a>';
                    echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: -35px;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">' . $recipe->ID_RESEP . '</span></button>
                </div>';
                    echo '<h2>' . ($this->session->lang === "en" ? $recipe->EN_NAMA_RESEP : $recipe->NAMA_RESEP) . '</h2>';
                    echo '<a href="' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color: white;"><p><span class="fa fa-long-arrow-right"></span>&nbsp;View recipe</p></a>';
                    echo '</div></div>';
                }
                echo '</div>';
                }
                else
                    echo '<h5 class="text-center">There is no recipes related to this product yet</h5>';
                ?>

            </div>
        </div>
    </div>
    <hr>
    <?php
    if ($pages > 1)
    {
        echo '<div class="text-center">
    <button class="btn koepoekoepoe-red btn-round koepoekoepoe-infinite-btn">LOAD MORE</button>
    <button class="btn koepoekoepoe-red btn-round koepoekoepoe-loading-btn" style="display: none"><i class="fa fa-circle-o-notch fa-spin"></i> Retrieving</button>

</div>';
    }
    ?>
    <hr>
    <script>
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
    </script>
</div>
<div id="shareModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Share On Social Media</h4>
            </div>
            <div class="modal-body text-center">
                <a class="sosmed-share" target="_blank"
                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . 'recipes/details/' . $resep->ID_RESEP ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_fb.png"></a>
                <a class="sosmed-share" target="_blank"
                   href="https://twitter.com/intent/tweet?text=<?php echo base_url() . 'recipes/details/' . $resep->ID_RESEP ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_twt.png"></a>
                <a href="whatsapp://send?text=<?php echo base_url() . 'recipes/details/' . $resep->ID_RESEP ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_wa.png"></a>
                <a class="sosmed-share" target="_blank"
                   href="https://plus.google.com/share?url=<?php echo base_url() . 'recipes/details/' . $resep->ID_RESEP ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_google.png"></a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
<script>
    function printRecipe() {
        $('.printThis').printThis({
            importCSS: true,
            importStyle: true,
            printContainer: true,
            loadCSS: '',
            header: '<h2 class="text-center">Koepoe-Koepoe Recipe</h2>',
            footer: '<hr><p class="text-center">Copyright &copy; 2017 KoepoeKoepoe. All Rights Reserved.</p>'
        });
    }
</script>
<div style="display: none">
    <?php
    for ($i = 1; $i < $pages; $i ++)
    {
        echo '<p class="pages">' . $i . '</p>';
    }
    ?>
    <p id="key_product"><?php echo $resep->KEY_PRODUCT ?></p>
</div>
<p id="type" class="hidden">resep</p>
