<?php
session_start();
require("../inc/functions.php");

$nom = $_SESSION['Nom'];
$categorie_id = isset($_GET['categorie']) ? $_GET['categorie'] : null;
$objets = maka_objet($categorie_id);
$categories = maka_categorie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>
<div class="home_body">
    <h1 class="text-center">Welcome <?php echo htmlspecialchars($nom); ?> </h1>
    <p class="h3 text-center">Liste des objets : </p>
    <div class="mb-4">
    <form method="GET" action="home.php" class="d-flex gap-2 mb-4">
        <select name="categorie" class="form-select form-select-lg">
            <option value="">Filtrer par catégories</option>
            <?php
            $categories = maka_categorie();
            foreach ($categories as $cat) {
                $selected = (isset($_GET['categorie']) && $_GET['categorie'] == $cat['id_categorie']) ? 'selected' : '';
                echo "<option value=\"{$cat['id_categorie']}\" $selected>{$cat['nom_categorie']}</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-secondary btn-lg">Valider</button>
    </form>
    </div>
    <div class="container text-center mt-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            <?php foreach ($objets as $objet): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($objet['nom_objet']); ?></h5>
                            <p class="card-text"><strong>Catégorie :</strong> <?php echo htmlspecialchars($objet['categorie']); ?></p>

                            
                            <?php if ($objet['date_emprunt']): ?>
                                <p class="card-text"><strong>Statut :</strong>
                                    <?php echo $objet['date_retour'] ? "Retourné" : "En cours"; ?>
                                </p>
                                <p class="card-text"><strong>Emprunté par :</strong> <?php echo htmlspecialchars($objet['emprunteur']); ?></p>
                            <?php else: ?>
                                <p class="card-text"><strong>Statut :</strong> Disponible</p> 
                                <button>
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front text">
                                    <?php
                                        $_SESSION['objet'] = [
                                            'nom_objet' => $objet['nom_objet'],
                                            'categorie' => $objet['categorie']
                                        ];
                                    ?>
                                    <a href="emprunt.php?objet=<?php echo urlencode($objet['nom_objet']); ?>&categorie=<?php echo urlencode($objet['categorie']); ?>" class="btn btn-outline-info mt-2">Emprunter</a>
                                </span>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<p class="p-3 text-center h3"><a href="upload.php">Ajouter un objet</a></p>
</div>
</body>
</html>
