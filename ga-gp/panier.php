<?php
session_start();
include_once("functions-panier.php");

$erreur = false;

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));
if ($action !== null) {
    if (!in_array($action, array('ajout', 'suppression', 'refresh')))
        $erreur = true;

    //r�cuperation des variables en POST ou GET
    $l = (isset($_POST['l']) ? $_POST['l'] : (isset($_GET['l']) ? $_GET['l'] : null));
    $p = (isset($_POST['p']) ? $_POST['p'] : (isset($_GET['p']) ? $_GET['p'] : null));
    $q = (isset($_POST['q']) ? $_POST['q'] : (isset($_GET['q']) ? $_GET['q'] : null));

    //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '', $l);
    //On verifie que $p soit un float
    $p = floatval($p);

    //On traite $q qui peut etre un entier simple ou un tableau d'entier

    if (is_array($q)) {
        $QteArticle = array();
        $i = 0;
        foreach ($q as $contenu) {
            $QteArticle[$i++] = intval($contenu);
        }
    } else
        $q = intval($q);

}

if (!$erreur) {
    switch ($action) {
        Case "ajout":
            ajouterArticle($l, $q, $p);
            break;

        Case "suppression":
            supprimerArticle($l);
            break;

        Case "refresh" :
            for ($i = 0; $i < count($QteArticle); $i++) {
                modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i], round($QteArticle[$i]));
            }
            break;

        Default:
            break;
    }
}
?>
<?php include "config.php";
$pattern = "/";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $pattern ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pattern ?>css/style.css">
    <script src="<?php echo $pattern ?>js/jquery.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-55713162-1', 'auto');
        ga('send', 'pageview', {
            'title': 'Panier',
            'page': '/Panier'
        });
    </script>
</head>
<body>
<?php include "entete.php"; ?>
<div class="container">
    <div class="row">
        <div class="span3 bs-docs-sidenav">
            <?php include "navbar.php"; ?>
        </div>
        <div class="span9">
            <form method="POST" action="<?php echo $pattern ?>commande.php">
                <table class="table">
                    <tr>
                        <td>Libellé</td>
                        <td>Quantité</td>
                        <td>Prix Unitaire</td>
                        <td>Action</td>
                    </tr>


                    <?php
                    if (creationPanier()) {
                        $nbArticles = count($_SESSION['panier']['libelleProduit']);
                        if ($nbArticles <= 0)
                            echo "<tr><td>Votre panier est vide </td></tr>";
                        else {
                            for ($i = 0; $i < $nbArticles; $i++) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]) . "</td>";
                                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"" . htmlspecialchars($_SESSION['panier']['qteProduit'][$i]) . "\"/></td>";
                                echo "<td>" . htmlspecialchars($_SESSION['panier']['prixProduit'][$i]) . "€</td>";
                                echo "<td><a href=\"" . $pattern . htmlspecialchars("panier.php?action=suppression&l=" . rawurlencode($_SESSION['panier']['libelleProduit'][$i])) . "\">XX</a></td>";
                                echo "</tr>";
                            }

                            echo "<tr><td colspan=\"2\"> </td>";
                            echo "<td colspan=\"2\">";
                            echo "Total : " . MontantGlobal();
                            echo "</td></tr>";

                            echo "<tr><td colspan=\"4\">";
                            echo "<input type=\"submit\" value=\"Commander\"/>";

                            echo "</td></tr>";
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo $pattern ?>js/jquery.js"></script>
<script src="<?php echo $pattern ?>js/bootstrap.js"></script>
<script src="<?php echo $pattern ?>js/bootstrap.min.js"></script>
<script src="<?php echo $pattern ?>js/myscript.js"></script>
</body>
</html>

