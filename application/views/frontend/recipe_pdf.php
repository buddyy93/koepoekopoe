
<?php
echo '<h3 style="color: red; text-align: center">' . $resep->NAMA_RESEP . '</h3>'; ?>
<img height="200px" width="200px" style="display: block; margin: auto; text-align: center" src="<?php echo base_url().'uploads/'.$resep->RFOTO ?>">

<?php echo '<p>' . $resep->DESKRIPSI_RESEP . '</p>';
?>
<br>
<table class="table text-center">
    <tbody style="text-align: center">
    <tr style="text-align: center">
        <td style="text-align: center">
            <h3><?php echo $resep->PREP_TIME ?></h3>
            <p>Prep Time</p>
        </td>
        <td style="text-align: center">
            <h3><span class="fa fa-clock-o"></span><?php echo $resep->COOK_TIME ?></h3>
            <p>Cook time</p>
        </td>
    </tr>
    <tr style="text-align: center">
        <td style="text-align: center">
            <h3><?php echo $resep->KALORI ?></h3>
            <p>Calories</p>
        </td>
        <td style="text-align: center">
            <h3><?php echo $resep->JUMLAH_INGREDIENT ?></h3>
            <p>Ingredients</p>
        </td>
    </tr>
    </tbody>
</table>
<h4>How to cook</h4>
<table cellpadding="5">
    <tbody>
    <?php
    $index = 1;
    $steps = $this->session->lang === "en" ? $resep->EN_HOW_TO_COOK : $resep->HOW_TO_COOK;
    foreach (explode('</p>', $steps, - 1) as $step)
    { ?>
        <tr>
            <td style="color: black; width: 5%; border: 1px solid black;text-align: center;line-height: 20px">
                <?php echo $index ?>
            </td>
            <td style="text-align: justify; color: black; width:fit-content; border: 1px solid black; line-height: 20px"><?php echo strip_tags($step) ?>
            </td>
        </tr>
        <?php $index ++;
    }
    ?>
    </tbody>
</table>
<hr>
<p style="font-size: x-small;font-weight: bold; text-align: center">Copyright &copy; 2017 KoepoeKoepoe. All Rights Reserved.</p>

