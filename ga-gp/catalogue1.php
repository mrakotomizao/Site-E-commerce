<?php
$cat = isset($_GET['categorie']) ? " WHERE id_cat=" . $_GET['categorie'] : "";
$sscat = isset($_GET['souscat']) ? " AND id_sscat=" . $_GET['souscat'] : "";
$prod = isset($_GET['prod']) ? " AND id_prod" . $_GET['prod'] : "";
//modifier l\'id_cat'
$query = $dbh->query('SELECT * FROM produit' . $cat . $sscat . $prod);
?>
<table class="table table-responsive">
    <tbody>
    <?php
    $tot = count($query);
    $cpt = 0;
    foreach ($query as $prod) {
        if ($cpt == 0) {
            echo "<tr>";
        }
        ?>
        <td>
            <a href="/produit/<?php echo $prod['label']?>/<?php echo $prod['id_prod']?>" class="img1"><img
                    src="<?php echo $pattern?>image<?php echo $prod['image'];?> "
                    style="height:250px;width : 250px;"></a><br/>

            <div class="add">
                <a href="/ajout/l/<?php echo $prod['label']?>/q/1/p/<?php echo $prod['price'] ?>">Ajouter au panier</a>
            </div>
            <div class="libelle"><?php echo utf8_encode($prod["label"]);?></div>
            <div class="price"><?php echo utf8_encode($prod["price"]);?>€</div>

        </td>
        <?php
        ++$cpt;
        if ($cpt == 3) {
            echo "</tr>";
            $cpt = 0;
        }

    }
    ?>
    </tbody>
</table>