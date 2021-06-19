<?php
if ($recipes)
{
    if (sizeof($recipes) == 1)
    {
        echo '<div class="owl-carousel owl-theme text-center">';
        echo '<div>';
        echo '<img src="' . base_url() . 'uploads/' . $recipes[0]->RFOTO . '" style="padding:0px">';
        echo '<div class="caption">';
        echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang==="en"?$recipes[0]->EN_NAMA_RESEP_KATEGORI:$recipes[0]->NAMA_RESEP_KATEGORI) . '</button>';
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
                echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang==="en"?$recipe->EN_NAMA_RESEP_KATEGORI:$recipe->NAMA_RESEP_KATEGORI) . '</button>';
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
                echo '<button class="btn btn-round btn-transparent">' . ($this->session->lang==="en"?$recipe->EN_NAMA_RESEP_KATEGORI:$recipe->NAMA_RESEP_KATEGORI) . '</button>';
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
}
?>