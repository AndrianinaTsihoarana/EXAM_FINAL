<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <title>Document</title>
</head>
<body>

  <div class="upload-container">
    <h2>Nouvelle publication</h2>
    <form action="../traitement/traitement_upload.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" placeholder="Titre de votre post" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Décrivez votre image ou vidéo..."></textarea>
      </div>
      <div class="form-group">
        <label for="media">Fichier (image ou vidéo)</label>
        <input type="file" id="media" name="fichier" accept="image/*,video/*" required>
      </div>
      <button type="submit" class="btn-upload">Publier</button>
    </form>
    <div class="back-link">
      <a href="home.php">⬅ Retour </a>
    </div>
  </div>

</body>
</html>