<?php
include "config.php";
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
            'title': 'Commande',
            'page': '/Commande'
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
        <div class="span9" id="commande">
            <p id="merci">MERCI</p>
        </div>
    </div>
</div>
<script src="<?php echo $pattern ?>js/jquery.js"></script>
<script src="<?php echo $pattern ?>js/bootstrap.js"></script>
<script src="<?php echo $pattern ?>js/bootstrap.min.js"></script>
<script src="<?php echo $pattern ?>js/myscript.js"></script>
</body>
</html>

