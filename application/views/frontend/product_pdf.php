<?php
echo '<h3 style="color: red; text-align: center">' . ($this->session->lang === "en" ? $produk->EN_NAMA_PRODUK : $produk->NAMA_PRODUK) . '</h3>'; ?>
<img height="200px" width="200px" style="display: block; margin: auto; text-align: center" src="<?php echo base_url().'uploads/'.$produk->PFOTO ?>">

<p><?php echo($this->session->lang === "en" ? $produk->EN_DESKRIPSI_PRODUK : $produk->DESKRIPSI_PRODUK) ?></p>
<?php echo($this->session->lang === "en" ? $produk->EN_KONTEN_PRODUK : $produk->KONTEN_PRODUK) ?>
<h4>Full Ingredients</h4>
<p><?php echo($this->session->lang === "en" ? $produk->EN_INGREDIENT_PRODUK : $produk->INGREDIENT_PRODUK) ?></p>
<br>
<hr>
<p style="font-size: x-small;font-weight: bold; text-align: center">Copyright &copy; 2017 KoepoeKoepoe. All Rights Reserved.</p>
