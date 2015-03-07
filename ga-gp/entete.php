<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">Site de E-commerce</a>
        </div>
        <div class="" id="CustomNav">

            <ul class="nav navbar-nav collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                <?php
                $categories = $dbh->query('SELECT * FROM categorie');
                foreach ($categories as $categorie) {
                    echo '<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="index.php?page=cat&categorie=' . $categorie['id_cat'] . '">' . $categorie["label"] . '</a>
					';
                    $souscategories = $dbh->query('SELECT cas.id_cat,cas.id_sscat,sc.label_sscat,c.label FROM souscategorie sc
					INNER JOIN categorie_and_sscat cas on cas.id_sscat=sc.id_sscat
					INNER JOIN categorie c on c.id_cat=cas.id_cat
					WHERE cas.id_cat =' . $categorie["id_cat"]);
                    if ($souscategories) {
                        echo "<ul class='dropdown-menu'>";
                        foreach ($souscategories as $sscat) {
                            echo '<li><a href="/cat/' . $categorie['id_cat'] . '/' . $sscat['id_sscat'] . '">' . $sscat['label_sscat'] . '</a></li>';
                        }
                        echo "</ul>";
                    }
                    echo "</li>";
                }
                ?>
            </ul>
            <a href="<?php echo $pattern ?>panier.php">
                <button type="button" class="btn btn-default navbar-brand panier" aria-label="Left Align">
                    <span class="glyphicon glyphicon-shopping-cart"></span>Panier
                </button>
            </a>
        </div>
    </div>
</nav>