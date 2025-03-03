<?php
require 'Produit.php';
session_start();

$produitObj = new Produit();
if ($produitObj->delete($id)) {
    echo "Produit ajouté";
} else {
    echo "Erreur lors de l'ajout";
}

header("Location: index.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supprimer un article</title>
</head>
<body>


</body>
</html>
