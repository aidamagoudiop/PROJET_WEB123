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

// Styles CSS pour les cartes de salle
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

    .btn-supprimer {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-supprimer:hover {
        background-color: #e60000;
    }
</style>';

// Requête SQL pour récupérer les salles
$sql = "SELECT * FROM Salles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="cards-container">';
    while($row = $result->fetch_assoc()) {
        // Construire le chemin de l'image
        $image_path = 'img_salles/' . $row["photo"];
        
        echo '<div class="card">
                <img src="' . $image_path . '" alt="Photo" class="card-image">
                <div class="card-content">
                    <h2>' . $row["type"] . '</h2>
                    <p><strong>Nombre de personnes:</strong> ' . $row["nbr_personnes"] . '</p>
                    <p><strong>Description:</strong> ' . $row["description"] . '</p>
                    <p><strong>Tarif:</strong> ' . $row["tarifs"] . ' FCFA</p>
                    <form action="supprimer_salle.php" method="post">
                        <input type="hidden" name="salle_id" value="' . $row["id"] . '">
                        <button type="submit" class="btn-supprimer">Supprimer</button>
                    </form>
                </div>
              </div>';
    }
    echo '</div>'; // Fermeture de la div cards-container
} else {
    echo "Aucune salle trouvée.";
}
$conn->close();
?>
