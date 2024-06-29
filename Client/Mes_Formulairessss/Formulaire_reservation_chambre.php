<!DOCTYPE html>
<html>
<head>
<title>Formulaire de Réservation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-list/2.10.0/country-list.min.js"></script>
</head>
<body>
<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les IDs des chambres
$sql = "SELECT id, type FROM Chambre";
$result = $conn->query($sql);
?>

<div class="container">
  <div class="width-50">
    <div class="banner-section">
      <div style="width: 646px; display: flex; flex-direction: column;">
        <div style="color: white; font-size: 35px; font-family: Poppins; font-weight: bold; word-wrap: break-word;">Veuillez saisir les</div>
        <div style="color: #C94842; font-size: 30px; font-family: Poppins; font-weight: bold; word-wrap: break-word;">informations de la </div>
        <div style="color: #C94842; font-size: 30px; font-family: Poppins; font-weight: bold; word-wrap: break-word;">réservation de chambre !</div>
      </div>
      <div><img src="LOGO.png" alt="logo"></div>
      <div class="contact-info">
        <div>
          <i class="fa fa-envelope"></i>
          <span>terangaLodge@gmail.com</span>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <span>+221 77 223 55 32</span>
        </div>
        <div>
          <i class="fa fa-map-marker"></i>
          <span>Fass, Dakar, Sénégal</span>
        </div>
      </div>
    </div>
  </div>
  <div class="width-50">
    <form action="Enregistrer_reservation_chambre.php" method="POST">

      <select name="id_chambre" required>
        <option value="" disabled selected>Choisissez une chambre</option>
        <?php
        // Affichage des options pour chaque chambre disponible
        while ($row = $result->fetch_assoc()) {
          echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['type'] . '</option>';
        }
        ?>
      </select><br><br>

      <input type="number" id="nombre_enfants" name="nombre_enfants" required placeholder="Nombre d'enfants" min="0"><br><br>

      <input type="number" id="nombre_adultes" name="nombre_adultes" required placeholder="Nombre d'adultes" min="1"><br><br>

      <label for="date_arrivee">Date d'arrivée :</label>
      <input type="date" id="date_arrivee" name="date_arrivee" required placeholder="Date d'arrivée" class="custom-placeholder"><br><br>

      <label for="date_depart">Date de départ :</label>
      <input type="date" id="date_depart" name="date_depart" required placeholder="Date de Départ" class="custom-placeholder"><br><br>

      <input type="hidden" id="date_actuelle_hidden" name="date_actuelle_hidden">

      <input type="submit" value="Envoyer">
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(function(input) {
      input.addEventListener("focus", function() {
        this.setAttribute("placeholder", "");
        this.classList.remove("custom-placeholder");
      });
      input.addEventListener("blur", function() {
        if (!this.value && !this.classList.contains("custom-placeholder")) {
          if (this.id === "date_arrivee") {
            this.setAttribute("placeholder", "Date d'arrivée");
          } else if (this.id === "date_depart") {
            this.setAttribute("placeholder", "Date de départ");
          }
          this.classList.add("custom-placeholder");
        }
      });
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    var today = new Date();
    var day = String(today.getDate()).padStart(2, "0");
    var month = String(today.getMonth() + 1).padStart(2, "0");
    var year = today.getFullYear();

    var dateActuelle = day + "/" + month + "/" + year;
    document.getElementById("date_actuelle_hidden").value = dateActuelle;
  });
</script>

<?php
$conn->close();
?>

</body>
</html>
