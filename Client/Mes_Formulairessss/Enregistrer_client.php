<?php
session_start();

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "Neymar"; // Utilisateur créé dans votre base de données
$mot_de_passe = "passer"; // Mot de passe de l'utilisateur
$base_de_donnees = "Projet_Web";
$bdd = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($bdd->connect_error) {
    die("Erreur de connexion à la base de données : " . $bdd->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$civilite = $_POST['civilite'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$code_postal = $_POST['code_postal'];
$pays_residence = $_POST['pays'];

// Vérifier si le numéro de téléphone existe déjà
$sql_verification = "SELECT id FROM Client WHERE num_tel = '$telephone'";
$resultat = $bdd->query($sql_verification);

if ($resultat->num_rows > 0) {
    // Le client existe déjà
    $row = $resultat->fetch_assoc();
    $_SESSION['client_id'] = $row['id'];
    $message = "Vous êtes déjà enregistré !";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location.href = 'formulaire_reservation_chambre.php';</script>";
} else {
    // Le client n'existe pas, insérer un nouveau client
    $sql_insertion = "INSERT INTO Client (nom, prenom, civilite, num_tel, email, adresse, ville, code_postal, pays_residence) 
                      VALUES ('$nom', '$prenom', '$civilite', '$telephone', '$email', '$adresse', '$ville', '$code_postal', '$pays_residence')";

    if ($bdd->query($sql_insertion) === TRUE) {
        // Récupérer l'ID du client nouvellement inséré
        $_SESSION['client_id'] = $bdd->insert_id;
        $message = "Enregistrement réussi !";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = 'formulaire_reservation_chambre.php';</script>";
    } else {
        $erreur = "Erreur lors de l'enregistrement : " . $sql_insertion . "<br>" . $bdd->error;
        echo "<script type='text/javascript'>alert('$erreur');</script>";
    }
}

// Fermer la connexion à la base de données
$bdd->close();
?>
