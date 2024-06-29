<?php
// Démarrer la session
session_start();

// Informations de connexion à la base de données
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$photo = $_POST['photo'];
$etage = $_POST['etage'];
$statut = $_POST['statut'];
$capacite = $_POST['capacite'];
$type = $_POST['type'];
$tarif = $_POST['tarif'];
$chambre_nettoye = isset($_POST['chambre_nettoye']) ? 1 : 0;
$dernier_nettoyage = $_POST['dernier_nettoyage'];
$salle_de_bain = isset($_POST['salle_de_bain']) ? 1 : 0;
$toilette = isset($_POST['toilette']) ? 1 : 0;
$televiseur = isset($_POST['televiseur']) ? 1 : 0;
$climatiseur = isset($_POST['climatiseur']) ? 1 : 0;
$telephone = isset($_POST['telephone']) ? 1 : 0;
$num_telephone = $_POST['num_telephone'];
$description = $_POST['description'];

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO Chambre (photo, etage, statut, capacite, type, tarif, chambre_nettoye, dernier_nettoyage, salle_de_bain, toilette, televiseur, climatiseur, telephone, num_telephone, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisissdissiiiss", $photo, $etage, $statut, $capacite, $type, $tarif, $chambre_nettoye, $dernier_nettoyage, $salle_de_bain, $toilette, $televiseur, $climatiseur, $telephone, $num_telephone, $description);

// Exécuter la requête
if ($stmt->execute()) {
    // Script JavaScript pour afficher une boîte de dialogue
    echo "<script>";
    echo "alert('Les informations ont été enregistrées avec succès !');";
    echo "window.history.back();"; // Revenir à la page précédente
    echo "</script>";
} else {
    echo "Erreur: " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
