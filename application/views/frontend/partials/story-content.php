<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner">
        <img class="content-banner" height="500px" width="100%"
             src="<?php echo base_url(); ?>/public/images/header_stories_content.jpg">
        <div class="koepoekoepoe-banner-content">

        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row koepoekoepoe-content" style="padding:5% 5%;">
            <div class="col-md-12">
                <div class="row" style="padding:30px 0px 20px 30px;">
                    <h4><?php echo $story->NAMA_STORY_KATEGORI ?></h4>
                    <h1 class="visible-lg visible-md"><?php echo $story->JUDUL_STORY ?></h1>
                    <h2 class="visible-sm visible-xs" style="font-size: x-large;"><?php echo $story->JUDUL_STORY ?></h2>
                    <p class="visible-lg visible-md"><span class="fa fa-user"></span>&nbsp;by
                        <strong><?php echo $story->PENULIS ?></strong>&nbsp;&bull;&nbsp;<?php
                        $yrdata = strtotime($story->CREATED_AT);
                        echo date('d M, Y', $yrdata);
                        ?>&nbsp;&bull;&nbsp;<span class="fb-comments-count"
                                                  data-href="<?php echo current_url() ?>"></span> Comments</p>
                    <p class="visible-sm visible-xs"><span class="fa fa-user"></span>&nbsp;by
                        <strong><?php echo $story->PENULIS ?></strong><br><br>June
                        20, 2017&nbsp;&bull;&nbsp;<span class="fb-comments-count"
                                                        data-href="<?php echo current_url() ?>"></span> Comments</p>
                </div>
                <div class="row">
                    <div class="col-md-3 visible-lg visible-md">
                        <button class="btn btn-round story-love-btn"><span class="fa fa-heart-o"></span>&nbsp;
                            <?php echo $story->LIKE_COUNT == null ? 0 : $story->LIKE_COUNT ?>
                        </button>
                        <br><br>
                        <div class="input-group form-control" style="border:none; width: 70%">
                            <button class="btn btn-round-left" style="background: rgba(46,77,167,1.00); color: white">
                                <span class="fa fa-facebook"></span></button>
                            <a target="_blank"
                               href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . 'stories/details/' . $story->ID_STORY ?>"
                               class="btn btn-round-right sosmed-share"
                               style="background: rgba(46,77,167,.80); color: white;">
                                <strong>SHARE</strong></a>
                        </div>
                        <div class="input-group form-control" style="border:none; width: 70%">
                            <button class="btn btn-round-left" style="background: rgba(54,185,255,1.00); color: white;">
                                <span class="fa fa-twitter"></span></button>
                            <a target="_blank"
                               href="https://twitter.com/intent/tweet?text=<?php echo base_url() . 'stories/details/' . $story->ID_STORY ?>"
                               class="btn btn-round-right sosmed-share"
                               style="background: rgba(54,185,255,.80); color: white;">
                                <strong>TWEET</strong></a>
                        </div>
                        <div class="input-group form-control" style="border:none; width: 70%">
                            <button class="btn btn-round-left btn-md"
                                    style="background:rgba(128,128,128,1.00); color: white;"><span
                                        class="material-icons" style="font-size: small">mail</span></button>
                            <a href="mailto:?subject=<?php echo str_replace(" ","%20","$story->JUDUL_STORY") ?>&amp;body=<?php echo current_url() ?>" target="_blank"><button class="btn btn-md btn-round-right"
                                    style="background:rgba(128,128,128,.80); color: white;"><strong>EMAIL</strong>
                            </button></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="theContent">
                            <?php echo $story->KONTEN_STORY ?>
                        </div>
                        <hr>
                        <button onclick="toggleComment()" id="viewcomment" style="color: black;" class="btn btn-round form-control"><strong><span class="fa fa-comment"></span>&nbsp;VIEW
                                COMMENTS</strong></button>
                            <button onclick="toggleComment()" id="hidecomment" style="color: black; display: none;" class="btn btn-round form-control"><strong><span class="fa fa-comment"></span>&nbsp;HIDE
                                COMMENTS</strong></button>
                        <br><br>
                        <a target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . 'stories/details/' . $story->ID_STORY ?>"
                           class="btn btn-round form-control sosmed-share"
                           style="background: rgba(46,77,167,1.00); color: white"><strong><span
                                        class="fa fa-facebook"></span>&nbsp;SHARE THIS ARTICLE</strong></a>
                        <br><br>
                        <a target="_blank"
                           href="https://twitter.com/intent/tweet?text=<?php echo base_url() . 'stories/details/' . $story->ID_STORY ?>"
                           class="btn btn-round form-control sosmed-share"
                           style="background: rgba(54,185,255,1.00); color: white;"><strong><span
                                        class="fa fa-twitter"></span>&nbsp;TWEET THIS ARTICLE</strong></a>
                        <br><br>
                        <div class="view-comment" style="display: none">
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
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="container story-container-nopadding">
    <div class="koepoekoepoe-story-header">
        <h2 class="story-header-responsive">Related articles</h2>
        <p class="visible-lg visible-md">View all stories</p>
        <div class="pull-right visible-lg visible-md">
            <span class="glyphicon glyphicon-menu-left"></span>
            <span class="glyphicon glyphicon-menu-right img-circle"></span>
        </div>
    </div>
</div>
<br>
<div class="container story-owl-container">
    <div class="owl-carousel owl-theme text-center story-img">
        <?php
        foreach ($related_stories as $story)
        {
            echo '<div>';
            echo '<img src="' . base_url() . 'uploads/' . $story->SFOTO . '" style="padding: 0px">';

            echo '<div class="story-caption">';
            echo '<div class="my-pull-right">
                    <div class="dropdown">
            <button type="button" class="share-btn btn btn-default btn-circle" data-toggle="dropdown"><i
                        class="fa fa-share-alt"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" style="text-align: center; position: absolute;right: 0;top: 30px;">
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . base_url() . 'stories/details/' . $story->ID_STORY . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; height: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_fb.png"></a></li>
                <li style="display:inline;"><a href="whatsapp://send?text=' . base_url() . 'stories/details/' . $story->ID_STORY . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; height: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_wa.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://twitter.com/intent/tweet?text=' . base_url() . 'stories/details/' . $story->ID_STORY . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; height: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_twt.png"></a></li>
                <li style="display:inline;"><a class="sosmed-share" target="_blank" href="https://plus.google.com/share?url=' . base_url() . 'stories/details/' . $story->ID_STORY . '" style="color:black; text-decoration:none;outline: none; display:inline; padding: 5px 5px"><img style="width: 40px !important; height: 40px !important; display: inline; padding: 0 !important;" src="' . base_url() . 'public/images/icon_google.png"></a></li>
            </ul>
        </div>
                    <button type="button" class="like-btn btn btn-default btn-circle"><i class="fa fa-heart-o"></i>
                    <span style="display: none;">' . $story->ID_STORY . '</span></button>
                </div>';
            echo '</div>';

            echo '<div class="text-left story-desc">';
            echo '<h3><a href="' . base_url() . 'stories/details/' . $story->ID_STORY . '" style="outline:none;text-decoration:none;color:black;">' . $story->JUDUL_STORY . '</a></h3>';
            echo '<p>' . substr(strip_tags($story->KONTEN_STORY), 0, 200) . '</p>';
            echo '<p><span class="fa fa-pencil"></span>&nbsp;' . $story->PENULIS . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
<hr>
<script>
    $('.owl-carousel').owlCarousel({
        navText: ["<span class='glyphicon glyphicon-chevron-left'></span>", "<span class='glyphicon glyphicon-chevron-right'></span>"],
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
            }
        }
    });

    $(document).ready(function () {
        $('#theContent img').addClass('img-responsive');
    });

    function toggleComment()
    {
        $(".view-comment").toggle();
        $("#hidecomment").toggle();
        $("#viewcomment").toggle();
    }
</script>
<p id="type" class="hidden">story</p>
