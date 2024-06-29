<?php
// Récupérer l'ID de la réservation depuis l'URL
if(isset($_GET['id_reservation'])) {
    $id_reservation = $_GET['id_reservation'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "Neymar";
    $password = "passer";
    $dbname = "Projet_Web";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les informations du client et de la réservation
    $sql = "SELECT c.email, c.nom, c.prenom, ch.tarif AS tarif_chambre, rc.date_arrivee, rc.date_depart
            FROM Reservation_chambre rc
            INNER JOIN Client c ON rc.id_client = c.id
            INNER JOIN Chambre ch ON rc.id_chambre = ch.id
            WHERE rc.id = $id_reservation";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Informations pour l'envoi du mail
        $to = $row['email'];
        $subject = "Confirmation de réservation de chambre";
        $message = "Bonjour " . $row['prenom'] . " " . $row['nom'] . ",\n\n";
        $message .= "Nous vous confirmons la réservation de la chambre pour les dates suivantes :\n";
        $message .= "Date d'arrivée : " . $row['date_arrivee'] . "\n";
        $message .= "Date de départ : " . $row['date_depart'] . "\n";
        $message .= "Tarif de la chambre : " . $row['tarif_chambre'] . " FCFA\n\n";
        $message .= "Merci de votre confiance.\n\nCordialement,\nL'équipe de l'Hôtel XYZ";

        // Headers pour l'envoi du mail
        $headers = "From: aziznjr420@gmail.com\r\n";
        $headers .= "Reply-To: aziznjr420@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoyer le mail
        if (mail($to, $subject, $message, $headers)) {
            echo "Mail de confirmation envoyé à " . $to;
        } else {
            echo "Erreur lors de l'envoi du mail.";
        }
    } else {
        echo "Aucune réservation trouvée pour cet ID.";
    }

    $conn->close();
} else {
    echo "ID de réservation non spécifié.";
}
?>
