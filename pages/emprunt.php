<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>    
    <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>
    <h1 class="text-center">Vous allez emprunter :</h1>
    <div class="d-flex justify-content-center">
        <div class="card p-3" style="width: 28rem;">
            <img src="..." class="card-img-top" alt="Image de l'objet">
            <div class="card-body">
                <h5 class="card-title">
                    <strong>Objet :</strong> <?php echo htmlspecialchars($_GET['objet']); ?>
                </h5>
                <p class="card-text">
                    <strong>Catégorie :</strong> <?php echo htmlspecialchars($_GET['categorie']); ?>
                </p>
                <a href="#" class="btn btn-primary mb-3">Emprunter pendant 14 jours</a>

                <!-- Lien vers retour.php avec objet et catégorie en paramètre -->
                <a href="retour.php?objet=<?php echo urlencode($_GET['objet']); ?>&categorie=<?php echo urlencode($_GET['categorie']); ?>" class="btn btn-outline-success">
                    Retourner l'objet
                </a>
            </div>
        </div>
    </div>
</body>
</html>
