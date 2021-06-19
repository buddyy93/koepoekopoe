<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner printThis">
        <img class="content-banner" height="500px" width="100%"
             src="<?php echo base_url(); ?>/uploads/<?php echo $produk->KFOTO ?>">
        <div class="koepoekoepoe-banner-content">
            <div class="product-circle">
                <a href="<?php echo base_url() . 'uploads/' . $produk->PFOTO ?>" data-lightbox="image-1"
                   data-title="<?php echo($this->session->lang === "en" ? $produk->EN_NAMA_PRODUK : $produk->NAMA_PRODUK) ?>"
                   class="visible-lg visible-md">
                    <img width="175px" height="175px" class="img-circle"
                         src="<?php echo base_url() . 'uploads/' . $produk->PFOTO ?>"></a>
                <a href="<?php echo base_url() . 'uploads/' . $produk->PFOTO ?>" data-lightbox="image-2"
                   data-title="<?php echo($this->session->lang === "en" ? $produk->EN_NAMA_PRODUK : $produk->NAMA_PRODUK) ?>"
                   class="visible-sm visible-xs">
                    <img width="100px" height="100px" class="img-circle"
                         src="<?php echo base_url() . 'uploads/' . $produk->PFOTO ?>">
                </a>

            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row koepoekoepoe-content">
            <div class="col-md-8">
                <div class="printThis">
                    <a href="<?php echo base_url() . 'products/by/' . $produk->ID_PRODUK_KATEGORI ?>"
                       class="btn btn-round btn-content"><?php echo $produk->NAMA_PRODUK_KATEGORI ?></a>
                    <br>
                    <h2><?php echo($this->session->lang === "en" ? $produk->EN_NAMA_PRODUK : $produk->NAMA_PRODUK) ?></h2>

                    <p><?php echo($this->session->lang === "en" ? $produk->EN_DESKRIPSI_PRODUK : $produk->DESKRIPSI_PRODUK) ?></p>
                    <hr>
                    <?php echo($this->session->lang === "en" ? $produk->EN_KONTEN_PRODUK : $produk->KONTEN_PRODUK) ?>
                    <hr>
                </div>
                <h4>Related recipes</h4>
                <hr>
                <div>
                    <?php
                    if (isset($related_recipe))
                    {
                    ?>
                    <div class="owl-carousel owl-theme text-center" id="relatedrecipes">
                        <?php
                        foreach ($related_recipe as $recipe)
                        {
                            echo '<div>';
                            echo '<img src="' . base_url() . 'uploads/' . $recipe->RFOTO . '" style="padding:0px">';
                            echo '<div class="caption">';
                            echo '<button class="btn btn-round btn-transparent">' . $recipe->NAMA_RESEP_KATEGORI . '</button>';
                            echo '<div class="my-pull-right">
                    <div class="dropdown" style="display: inline;">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu" style="width: 220px !important;position: absolute;left: -70px;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url=' . base_url() . 'recipes/details/' . $recipe->ID_RESEP . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">'.$recipe->ID_RESEP.'</span></button>
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
                    <hr>
                    <div class="visible-lg visible-md">
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
                <div class="col-md-4">
                    <div class="visible-lg visible-md">
                        <button data-toggle="modal" data-target="#myModal"
                                class="btn-lg btn-round-lg form-control btn-koepoe-action">BUY THIS PRODUCT
                        </button>
                        <a href="<?php echo base_url().'products/generatePdf/'.$produk->ID_PRODUK ?>"><button class="btn-lg btn-round-lg form-control btn-koepoe-action"><span
                                    class="fa fa-heart-o"></span>&nbsp;SAVE
                            THIS PRODUCT
                        </button></a>
                        <button class="btn-lg btn-round-lg form-control btn-koepoe-action"
                                onclick="printProduct()"><span
                                    class="fa fa-print"></span>&nbsp;PRINT
                            THIS PRODUCT
                        </button>
                        <button class="btn-lg btn-round-lg form-control btn-koepoe-action" data-toggle="modal"
                                data-target="#shareModal"><span
                                    class="fa fa-share-alt"></span>&nbsp;SHARE THIS PRODUCT
                        </button>
                    </div>
                    <hr>
                    <h4>Full Ingredients</h4>
                    <hr>
                    <p><?php echo($this->session->lang === "en" ? $produk->EN_INGREDIENT_PRODUK : $produk->INGREDIENT_PRODUK) ?></p>
                    <hr>
                    <h4>UPC code</h4>
                    <hr>
                    <p><?php echo $produk->UPC_CODE ?></p>
                    <div class="visible-sm visible-xs">
                        <hr>
                        <button data-toggle="modal" data-target="#myModal"
                                class="btn-lg btn-round-lg form-control btn-koepoe-action">BUY THIS PRODUCT
                        </button>
                        <a href="<?php echo base_url().'products/generatePdf/'.$produk->ID_PRODUK ?>"><button class="btn-lg btn-round-lg form-control btn-koepoe-action"><span
                                    class="fa fa-heart-o"></span>&nbsp;SAVE
                            THIS PRODUCT
                        </button></a>
                        <button class="btn-lg btn-round-lg form-control btn-koepoe-action"
                                onclick="printProduct()"><span
                                    class="fa fa-print"></span>&nbsp;PRINT
                            THIS PRODUCT
                        </button>
                        <button class="btn-lg btn-round-lg form-control btn-koepoe-action" data-toggle="modal"
                                data-target="#shareModal"><span
                                    class="fa fa-share-alt"></span>&nbsp;SHARE THIS PRODUCT
                        </button>
                    </div>
                    <div class="visible-sm visible-xs">
                        <hr>
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

        <div class="container" style="padding:0;">
            <h3 class="visible-lg visible-md">Other products</h3>
            <h3 class="visible-sm visible-xs" style="margin-left: 5%">Other products</h3>
            <div class="owl-carousel owl-theme text-center" id="otherproducts"
                 style="padding-left: 0;padding-right: 0;">
                <?php
                foreach ($products as $product)
                { ?>
                    <div>
                        <a href="<?php echo base_url() . 'products/details/' . $product->ID_PRODUK ?>"><img
                                    src="<?php echo base_url() . 'uploads/' . $product->FOTO; ?>"></a>
                        <h4><?php echo($this->session->lang === "en" ? $produk->EN_NAMA_PRODUK : $produk->NAMA_PRODUK) ?></h4>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <?php
                echo form_open(base_url() . 'products/buyproduct', array('id' => 'orderproduct'));
                ?>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?php echo base_url() ?>/public/images/logo.png">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-10">
                            <input name="nama" type="text" class="form-control"
                                   value="<?php echo $this->session->flashdata('nama'); ?>"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Email</label>
                        </div>
                        <div class="col-md-10">
                            <input name="email" type="text" class="form-control"
                                   value="<?php echo $this->session->flashdata('email'); ?>"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>No Handphone</label>
                        </div>
                        <div class="col-md-10">
                            <input name="no_handphone" type="text" class="form-control"
                                   value="<?php echo $this->session->flashdata('no_handphone'); ?>"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Jumlah</label>
                        </div>
                        <div class="col-md-10">
                            <input name="jumlah" type="text"
                                   value="<?php echo $this->session->flashdata('jumlah'); ?>"/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="submit" class="btn btn-default btn-primary"
                    >Buy Product
                    </button>
                </div>
                <input name="id_produk" type="hidden" value="<?php echo $produk->ID_PRODUK ?>">
                <?php echo form_close();
                ?>
            </div>

        </div>
    </div>
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Notification</h4>
                </div>
                <div class="modal-body">
                    <?php if ($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
        <button class="hidden" id="confirmModalBtn" data-toggle="modal" data-target="#confirmModal"></button>
    </div>
    <hr>
    <hr>
    <script>
        $('#otherproducts').owlCarousel({
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
                    items: 4,
                    nav: true,
                }
            }
        });
        $('#relatedrecipes').owlCarousel({
            margin: 30,
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
                    nav: false
                }
            }
        });
        $(document).ready(function () {
            <?php if($this->session->flashdata('message'))
            { ?>
            $("#confirmModalBtn").click();
            <?php } ?>
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
                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . 'products/details/' . $produk->ID_PRODUK ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_fb.png"></a>
                <a class="sosmed-share" target="_blank"
                   href="https://twitter.com/intent/tweet?text=<?php echo base_url() . 'products/details/' . $produk->ID_PRODUK ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_twt.png"></a>
                <a href="whatsapp://send?text=<?php echo base_url() . 'products/details/' . $produk->ID_PRODUK ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_wa.png"></a>
                <a class="sosmed-share" target="_blank"
                   href="https://plus.google.com/share?url=<?php echo base_url() . 'products/details/' . $produk->ID_PRODUK ?>"
                   style="margin:2%"><img src="<?php echo base_url() ?>public/images/icon_google.png"></a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<script>
    function printProduct() {
        $('.printThis').printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: '',
            header: '<h2 class="text-center">Koepoe-Koepoe Products</h2>'
        });
    }
</script>
<p id="type" class="hidden">resep</p>
