<?php
require 'Produit.php';

// Démarrage de la session $_SESSION
session_start();

// Vérification de la soumission du formulaire via la méthode POST
// Super Globale
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    //$name = $_POST['nom'];
    //var_dump($name);
    //$name = isset($_POST['nom']);
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prix = isset($_POST['price']) ? trim($_POST['price']) : '';
    $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';

    try {
        $sql = "INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prix, $stock]);
        if ($stmt) {
            echo 'Produit ajouté';
        }
    } catch (PDOException $e) {
        echo 'error  est survenue ' . $e->getMessage();
    }
    header("Location: index.php");

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un produit</title>
    <link href="create.css" rel="stylesheet" />
</head>
<body>


        <form action="create.php" method="post">
            <h2>AJOUTER UN PRODUIT</h2>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prix">Prix : </label>
            <input type="number" name="price" id="price" required>

            <label for="stock">Stock : </label>
            <input type="number" id="nombre" name="stock" required></input>

            <button>Valider</button>

        </form>

</body>
</html>


