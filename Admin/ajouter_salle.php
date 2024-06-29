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
$type = $_POST['type'];
$nbr_personnes = $_POST['nbr_personnes'];
$description = $_POST['description'];
$tarif = $_POST['tarif'];
$photo = $_POST['photo'];

// Préparer et lier les paramètres
$stmt = $conn->prepare("INSERT INTO Salles (type, nbr_personnes, description, tarifs, photo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $type, $nbr_personnes, $description, $tarif, $photo);

// Exécuter la requête
if ($stmt->execute()) {
    // Affichage d'une alerte JavaScript pour informer l'utilisateur
    echo "<script>";
    echo "alert('Les informations ont été enregistrées avec succès !');";
    echo "window.location.href = 'layout.php';"; // Redirection vers le tableau de bord
    echo "</script>";
} else {
    echo "Erreur: " . $stmt->error;
}

// Fermer la déclaration et la connexion
$stmt->close();
$conn->close();
?>
