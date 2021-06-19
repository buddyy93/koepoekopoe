<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner">
        <img class="content-banner" height="500px" width="100%"
             src="<?php echo base_url(); ?>/public/images/header_stories.jpg">
        <div class="koepoekoepoe-banner-content">
            <img class="visible-lg visible-md" style="display: block; margin:5% auto;"
                 src="<?php echo base_url(); ?>/public/images/stories_header.png">
            <img class="visible-sm visible-xs" style="display: block; margin:auto; height: 200px"
                 src="<?php echo base_url(); ?>/public/images/stories_header.png">
        </div>
    </div>
    <hr>
    <div class="container visible-lg visible-md">
        <div class="row koepoekoepoe-stories-content">
            <div class="owl-carousel owl-theme featured-story">
                <?php
                foreach ($featured_stories as $story)
                {
                    echo '<div>';
                    echo '<div class="col-md-3 nopadding"><a href="' . base_url() . 'stories/details/' . $story->ID_STORY . '"><img class="featured-story-img"
                             src="' . base_url() . 'uploads/' . $story->FOTO . '" style="margin: 0px !important;padding: 0px"></a>
                            </div>';
                    if ($this->session->lang === "en")
                    {
                        echo '<div class="col-md-8" style="padding: 40px 10px;">
                        <h2><a href="' . base_url() . 'stories/details/' . $story->ID_STORY . '">' . $story->EN_JUDUL_STORY . '</a></h2>

                        <p>' . substr(strip_tags($story->EN_KONTEN_STORY), 0, 200) . '</p>
                        </div>';
                    } else
                    {
                        echo '<div class="col-md-8" style="padding: 40px 10px;">
                        <h2><a href="' . base_url() . 'stories/details/' . $story->ID_STORY . '">' . $story->JUDUL_STORY . '</a></h2>

                        <p>' . substr(strip_tags($story->KONTEN_STORY), 0, 200) . '</p>
                        </div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <hr>
    </div>
</div>
<hr>
<?php
for ($i = 1; $i <= sizeof($kategoris); $i ++)
{
    if (${'story' . $i})
    { ?>
        <div class="container story-container-nopadding">
            <div class="koepoekoepoe-story-header">
                <h2 class="story-header-responsive"><?php echo $kategoris[$i - 1]->NAMA_STORY_KATEGORI ?></h2>
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
                foreach (${'story' . $i} as $story)
                {
                    echo '<div>';
                    echo '<img src="' . base_url() . 'uploads/' . $story->FOTO . '" style="padding: 0px">';

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
                } ?>
            </div>
        </div>
        <br>
        <button class="btn-lg btn-round-lg btn-view-stories visible-sm visible-xs">View all stories</button>
        <hr>
        <?php
    }
}
?>
<script>
    $(document).ready(function () {
        $('.story-img').owlCarousel({
            loop: true,
            margin: 20,
            dots: false,
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
                    loop: false
                }
            }
        });
        $('.featured-story').owlCarousel({
            margin: 0,
            dots: false,
            navText: ["<span class='fa fa-long-arrow-left koepoe-story-nav'></span>", "<span class='fa fa-long-arrow-right koepoe-story-nav'></span>"],
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
                    items: 1,
                    nav: true,
                    loop: false
                }
            }
        });
    });
</script>
<p id="type" class="hidden">story</p>
