<?php
if ($products)
{
    if (sizeof($products) == 1)
    {
        echo '<div class="owl-carousel owl-theme text-center">';
        echo '<div>';
        echo '<a href="' . base_url() . '/products/details/' . $products[0]->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $products[0]->FOTO . '">
                            </a>';
        echo '<h4>' . ($this->session->lang === "en" ? $products[0]->EN_NAMA_PRODUK : $products[0]->NAMA_PRODUK) . '</h4>';
        echo '</div>';
        echo '</div>';
    } else
    {
        $index = 0;
        $size = sizeof($products);
        foreach ($products as $product)
        {
            if ($index == 0)
            {
                echo '<div class="owl-carousel owl-theme text-center">';
                echo '<div>';
                echo '<a href="' . base_url() . '/products/details/' . $product->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $product->FOTO . '">
                            </a>';
                echo '<h4>' . ($this->session->lang === "en" ? $product->EN_NAMA_PRODUK : $product->NAMA_PRODUK) . '</h4>';
                echo '</div>';
                $index ++;
                if ($products[$size - 1] == $product)
                    echo '</div>';
            } else if ($index < 4)
            {
                echo '<div>';
                echo '<a href="' . base_url() . '/products/details/' . $product->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $product->FOTO . '">
                            </a>';
                echo '<h4>' . ($this->session->lang === "en" ? $product->EN_NAMA_PRODUK : $product->NAMA_PRODUK) . '</h4>';
                echo '</div>';
                $index ++;
                if ($products[$size - 1] == $product)
                    echo '</div>';
                if ($index > 3)
                {
                    echo '</div>';
                    $index = 0;
                }
            }
        }
    }
}
?>
