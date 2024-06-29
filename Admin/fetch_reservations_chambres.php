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

// Requête SQL pour récupérer les réservations de chambres avec les détails requis
$sql = "SELECT 
            rc.id,
            c.nom,
            c.prenom,
            ch.photo AS chambre_photo,
            ch.tarif AS tarif_chambre,
            rc.nbr_adultes,
            rc.nbr_enfants,
            rc.date_arrivee,
            rc.date_depart
        FROM Reservation_chambre rc
        INNER JOIN Client c ON rc.id_client = c.id
        INNER JOIN Chambre ch ON rc.id_chambre = ch.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<style>
    .cards-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .card {
        width: 300px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 12px 12px 0 0;
    }

    .card-content {
        padding: 20px;
    }

    .card-content h2 {
        font-size: 1.6em;
        margin-bottom: 10px;
        color: #333333;
    }

    .card-content p {
        margin-bottom: 8px;
        color: #666666;
        line-height: 1.4;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .btn-confirmer, .btn-supprimer {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-confirmer:hover, .btn-supprimer:hover {
        background-color: #0056b3;
    }
    </style>';
    
    echo '<div class="cards-container">';
    while($row = $result->fetch_assoc()) {
        // Construire le chemin de l'image de la chambre
        $chambre_image_path = 'img_chambre/' . $row["chambre_photo"];
        
        echo '<div class="card">
                <img src="' . $chambre_image_path . '" alt="Photo de chambre" class="card-image">
                <div class="card-content">
                    <h2>Réservation de ' . $row["prenom"] . ' ' . $row["nom"] . '</h2>
                    <p><strong>Tarif de la chambre:</strong> ' . $row["tarif_chambre"] . ' FCFA</p>
                    <p><strong>Nombre d\'adultes:</strong> ' . $row["nbr_adultes"] . '</p>
                    <p><strong>Nombre d\'enfants:</strong> ' . $row["nbr_enfants"] . '</p>
                    <p><strong>Date d\'arrivée:</strong> ' . $row["date_arrivee"] . '</p>
                    <p><strong>Date de départ:</strong> ' . $row["date_depart"] . '</p>
                    <div class="btn-container">
                            <a href="mail_confirmation.php?id_reservation=' . $row["id"] . '" class="btn-confirmer">Confirmer</a>
                    <a href="supprimer_reservations.php?id_reservation=' . $row["id"] . '" class="btn-supprimer">Supprimer</a>
                    </div>
                </div>
              </div>';
    }
    echo '</div>'; // Fermeture de la div cards-container
} else {
    echo "Aucune réservation trouvée.";
}
$conn->close();
?>
