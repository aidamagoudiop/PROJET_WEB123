<?php
// Vérification si l'ID de la réservation est présent dans l'URL
if (isset($_GET['id_reservation'])) {
    $id_reservation = $_GET['id_reservation'];

    // Connexion à la base de données
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

    // Préparer la requête SQL pour supprimer la réservation
    $sql = "DELETE FROM Reservation_chambre WHERE id = ?";

    // Préparer la déclaration SQL
    $stmt = $conn->prepare($sql);

    // Vérifier si la préparation a réussi
    if ($stmt === false) {
        die('Erreur de préparation de la requête SQL: ' . $conn->error);
    }

    // Liaison des paramètres et exécution de la requête
    $stmt->bind_param('i', $id_reservation);
    if ($stmt->execute()) {
        // Redirection vers la page précédente après suppression
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Erreur lors de la suppression de la réservation: " . $stmt->error;
    }

    // Fermeture de la connexion
    $stmt->close();
    $conn->close();
} else {
    echo "ID de réservation non spécifié.";
}
?>
