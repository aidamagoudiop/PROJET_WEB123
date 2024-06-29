<?php
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire est soumis pour mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['chambre_id'])) {
    $chambre_id = $_POST['chambre_id'];

    // Récupérer les informations actuelles de la chambre à modifier
    $sql = "SELECT * FROM Chambre WHERE id = $chambre_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Pré-remplir les données dans le formulaire de modification
        $photo = $row["photo"];
        $etage = $row["etage"];
        $statut = $row["statut"];
        $capacite = $row["capacite"];
        $type = $row["type"];
        $tarif = $row["tarif"];
        $chambre_nettoye = $row["chambre_nettoye"];
        $dernier_nettoyage = $row["dernier_nettoyage"];
        $salle_de_bain = $row["salle_de_bain"];
        $toilette = $row["toilette"];
        $televiseur = $row["televiseur"];
        $climatiseur = $row["climatiseur"];
        $telephone = $row["telephone"];
        $num_telephone = $row["num_telephone"];
        $description = $row["description"];
    } else {
        echo "Aucune chambre trouvée.";
        exit;
    }
} else {
    echo "Erreur: Aucune chambre sélectionnée pour modification.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier une chambre</title>
  <link rel="stylesheet" href="layout.css" />
  <script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>
</head>
<body>
  <h2>Modifier la chambre <?php echo $chambre_id; ?></h2>
  <form action="traitement_modifier_chambre.php" method="post">
    <input type="hidden" name="chambre_id" value="<?php echo $chambre_id; ?>">
    
    <!-- Formulaire d'ajout de chambre pré-rempli -->
    <div class="form-group">
      <label for="photo">Nom de la photo :</label>
      <input type="text" id="photo" name="photo" value="<?php echo $photo; ?>" required>
      <small>Entrez le nom de l'image (ex: photo.jpg)</small>
    </div>
    <div class="form-group">
      <label for="etage">Étage :</label>
      <input type="number" id="etage" name="etage" value="<?php echo $etage; ?>" required>
    </div>
    <div class="form-group">
      <label for="statut">Statut :</label>
      <input type="text" id="statut" name="statut" value="<?php echo $statut; ?>" required>
    </div>
    <div class="form-group">
      <label for="capacite">Capacité :</label>
      <input type="number" id="capacite" name="capacite" value="<?php echo $capacite; ?>" required>
    </div>
    <div class="form-group">
      <label for="type">Type de chambre :</label>
      <select id="type" name="type" required>
        <option value="single" <?php if ($type == 'single') echo 'selected'; ?>>Single</option>
        <option value="double" <?php if ($type == 'double') echo 'selected'; ?>>Double</option>
        <option value="suite" <?php if ($type == 'suite') echo 'selected'; ?>>Suite</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tarif">Tarif par nuit (EUR) :</label>
      <input type="number" id="tarif" name="tarif" step="0.01" value="<?php echo $tarif; ?>" required>
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="chambre_nettoye" name="chambre_nettoye" <?php if ($chambre_nettoye) echo 'checked'; ?>>
      <label for="chambre_nettoye">Chambre nettoyée</label>
    </div>
    <div class="form-group">
      <label for="dernier_nettoyage">Dernier nettoyage :</label>
      <input type="date" id="dernier_nettoyage" name="dernier_nettoyage" value="<?php echo $dernier_nettoyage; ?>">
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="salle_de_bain" name="salle_de_bain" <?php if ($salle_de_bain) echo 'checked'; ?>>
      <label for="salle_de_bain">Salle de bain</label>
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="toilette" name="toilette" <?php if ($toilette) echo 'checked'; ?>>
      <label for="toilette">Toilette</label>
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="televiseur" name="televiseur" <?php if ($televiseur) echo 'checked'; ?>>
      <label for="televiseur">Téléviseur</label>
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="climatiseur" name="climatiseur" <?php if ($climatiseur) echo 'checked'; ?>>
      <label for="climatiseur">Climatiseur</label>
    </div>
    <div class="form-group checkbox-group">
      <input type="checkbox" id="telephone" name="telephone" <?php if ($telephone) echo 'checked'; ?>>
      <label for="telephone">Téléphone</label>
    </div>
    <div class="form-group">
      <label for="num_telephone">Numéro de téléphone :</label>
      <input type="text" id="num_telephone" name="num_telephone" value="<?php echo $num_telephone; ?>">
    </div>
    <div class="form-group">
      <label for="description">Description :</label>
      <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
    </div>
    <button type="submit" class="submit-btn">Modifier chambre</button>
  </form>
</body>
</html>
