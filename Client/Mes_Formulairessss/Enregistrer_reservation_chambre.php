<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nbr_enfants = $_POST['nombre_enfants'];
    $nbr_adultes = $_POST['nombre_adultes'];
    $date_arrivee = $_POST['date_arrivee'];
    $date_depart = $_POST['date_depart'];
    $date_actuelle = $_POST['date_actuelle_hidden'];
    $id_chambre = $_POST['id_chambre']; // Ajout pour récupérer l'ID de la chambre

    // Vérifier si l'ID du client est stocké dans la session
    if (!isset($_SESSION['client_id'])) {
        die("Erreur : l'ID du client est introuvable.");
    }

    $id_client = $_SESSION['client_id'];

    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "Neymar";
    $mot_de_passe = "passer";
    $base_de_donnees = "Projet_Web";
    $bdd = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    if ($bdd->connect_error) {
        die("Erreur de connexion à la base de données : " . $bdd->connect_error);
    }

    // Préparer la requête SQL d'insertion avec l'ID de la chambre
    $sql = "INSERT INTO Reservation_chambre (id_client, id_chambre, nbr_adultes, nbr_enfants, date_actuelle, date_arrivee, date_depart) 
            VALUES ('$id_client', '$id_chambre', '$nbr_adultes', '$nbr_enfants', '$date_actuelle', '$date_arrivee', '$date_depart')";

    // Exécuter la requête SQL
    if ($bdd->query($sql) === TRUE) {
        $message = "Enregistrement de la réservation de chambre réussi !";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
    } else {
        $erreur = "Erreur lors de l'enregistrement de la réservation de chambre : " . $bdd->error;
        echo "<script type='text/javascript'>alert('$erreur');</script>";
    }

    // Fermer la connexion à la base de données
    $bdd->close();
}
?>
