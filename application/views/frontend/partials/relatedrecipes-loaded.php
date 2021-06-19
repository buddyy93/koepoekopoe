<div class="owl-carousel owl-theme text-center" id="relatedrecipes">
<?php
foreach ($recipes as $recipe)
{
    echo '<div>';
    echo '<img src="' . base_url() . 'uploads/' . $recipe->RFOTO . '" style="padding:0px">';
    echo '<div class="caption">';
    echo '<a href="' . base_url() . 'recipes/by/' . $recipe->ID_RESEP_KATEGORI . '" class="btn btn-round btn-transparent" style="color:white;">' . ($this->session->lang==="en"?$recipe->EN_NAMA_RESEP_KATEGORI:$recipe->NAMA_RESEP_KATEGORI) . '</a>';
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
echo '</div>'; ?>
</div>
