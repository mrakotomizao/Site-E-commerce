<?php
/**
 * Created by PhpStorm.
 * User: Guizmo
 * Date: 27/02/2015
 * Time: 04:14
 */
$dsn = 'mysql:dbname=moiserako_fr;host=moiserako.fr.mysql';
$user = 'moiserako_fr';
$password = 'r65FyKJA';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}