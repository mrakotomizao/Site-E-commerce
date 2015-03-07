<ul class="nav nav-list bs-docs-sidenav affix">
    <li>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu"
            style="margin-bottom: 5px; display: block; position: static;">
            <li><a href="<?php echo $pattern ?>Accueil/">Accueil</a>
            </li>
            <?php
            $categories = $dbh->query('SELECT * FROM categorie');
            foreach ($categories as $categorie) {
                echo '<li class="divider"></li>';
                echo '<li class="dropdown-submenu">
									<a tabindex="-1" href="/cat/' . $categorie['id_cat'] . '">' . $categorie["label"] . '</a>
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
    </li>
    <li>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu"
            style="margin-bottom: 5px; display: block; position: static;">
            <li style="text-align:center;background-color:white;color:black;font-weight: bold;">SITE PARTENAIRES</li>
            <li><a style="" href="http://ns384875.ip-46-105-125.eu/grp3/"
                   onclick="trackOutboundLink('http://ns384875.ip-46-105-125.eu/grp3/'); return false;">Site de voiture
                    sympa</a></li>
            <li><a style="" href="http://buzzbuster.fr/"
                   onclick="trackOutboundLink('http://buzzbuster.fr/'); return false;">BuzzBuster</a></li>
            <li><a style="" href="http://4ecommerce.fr/gp33/"
                   onclick="trackOutboundLink('http://4ecommerce.fr/gp33/'); return false;">E-Sport Shop</a></li>
        </ul>
    </li>
</ul>
