<?php

require_once 'Produit.php';

$produitObj = new Produit(); // Nouvelle instance de produit

// Liste de produits
$produits = $produitObj->lister();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupération des données du formulaire
//$name = $_POST['nom'];
//var_dump($name);
//$name = isset($_POST['nom']);
    $name = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prix = isset($_POST['price']) ? trim($_POST['price']) : '';
    $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';

    $produitObj = new Produit();

    if ($produitObj->ajouter($name, $prix, $stock)) {
        echo "Produit ajouté";
    } else {
        echo "Erreur lors de l'ajout";
    }

    header("Location: index.php");
    exit();
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des produits (PDO)</title>
</head>
<body>
<h1> Liste des produits</h1>
<table>
    <thead>
    <tr>

        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($produits as $p): ?> <!--// : remplace les accolade du foreach-->
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['nom']) ?></td>
            <td><?= htmlspecialchars($p['prix']) ?> €</td>
            <td><?= htmlspecialchars($p['stock']) ?></td>
            <td><a class="edit" href="edit.php?id=<?= $p['id']; ?>">Modifier</a></td>
            <td><a class="delete" href="delete.php?id=<?= $p['id']; ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?> <!--// Fin du foreach -->
    </tbody>

</table>

<form action="index.php" method="post">
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