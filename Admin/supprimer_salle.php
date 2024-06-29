<?php
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Vérifier si l'ID de la salle à supprimer est passé en POST
if (isset($_POST['salle_id'])) {
    $salle_id = $_POST['salle_id'];

    // Créer la connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM Salles WHERE id = ?";

    // Préparer et exécuter la requête préparée
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $salle_id); // i pour integer, s'il s'agit d'une chaîne de caractères, utilisez "s"
    
    if ($stmt->execute()) {
        // Script JavaScript pour afficher une boîte de dialogue après la suppression réussie
        echo "<script>";
        echo "alert('La salle a été supprimée avec succès !');";
        echo "window.location.replace(document.referrer);"; // Recharger la page précédente
        echo "</script>";
    } else {
        echo "Erreur lors de la suppression de la salle: " . $conn->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
} else {
    echo "ID de salle non spécifié.";
}
?>
