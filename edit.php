<?php
require_once 'Produit.php';
session_start();
if (isset($_GET['id'])){
    $id = ($_GET['id']);

    $produitObj = new Produit();

    // Vérification de la soumission du formulaire via la méthode POST
// Super Globale
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupération des données du formulaire
//$name = $_POST['nom'];
//var_dump($name);
//$name = isset($_POST['nom']);
        $name = isset($_POST['nom']) ? trim($_POST['nom']) : '';
        $prix = isset($_POST['price']) ? trim($_POST['price']) : '';
        $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';

        if($name !== "" && $prix !== "" && $stock !== ""){
            $produitObj->modifier($name, $prix, $stock, $id);


        header("Location: index.php");
    }
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="create.css" rel="stylesheet" />
</head>
<body>
<form action="edit.php?id=<?=$id ?>" method="post">
    <h2>MODIFIER UN PRODUIT</h2>
    <label for="nom">Nom :</label>
    <input type="text" id="name" name="nom" required>

    <label for="prix">Prix : </label>
    <input type="number" name="price" id="price" required>

    <label for="stock">Stock : </label>
    <input type="number" id="nombre" name="stock" required>

    <button type="submit">Valider</button>

</form>

</body>
</html>