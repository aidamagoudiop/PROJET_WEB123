<?php
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission to update room data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chambre_id = $_POST['chambre_id'];
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

    $update_sql = "UPDATE Chambre SET 
                    etage='$etage', 
                    statut='$statut', 
                    capacite='$capacite', 
                    type='$type', 
                    tarif='$tarif', 
                    chambre_nettoye='$chambre_nettoye', 
                    dernier_nettoyage='$dernier_nettoyage', 
                    salle_de_bain='$salle_de_bain', 
                    toilette='$toilette', 
                    televiseur='$televiseur', 
                    climatiseur='$climatiseur', 
                    telephone='$telephone', 
                    num_telephone='$num_telephone', 
                    description='$description' 
                   WHERE id='$chambre_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

    .btn-modifier {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-modifier:hover {
        background-color: #45a049;
    }
</style>';

$sql = "SELECT * FROM Chambre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="cards-container">';
    while($row = $result->fetch_assoc()) {
        // Construct the image path from the retrieved name
        $image_path = 'img_chambre/' . $row["photo"];

        // Display room card with modification form
        echo '<div class="card">
                <img src="' . $image_path . '" alt="Photo" class="card-image">
                <div class="card-content">
                    <h2>Chambre ' . $row["id"] . '</h2>
                    <p><strong>Étage:</strong> ' . $row["etage"] . '</p>
                    <p><strong>Statut:</strong> ' . $row["statut"] . '</p>
                    <p><strong>Capacité:</strong> ' . $row["capacite"] . '</p>
                    <p><strong>Type:</strong> ' . $row["type"] . '</p>
                    <p><strong>Tarif:</strong> ' . $row["tarif"] . '</p>
                    <p><strong>Chambre Nettoyée:</strong> ' . ($row["chambre_nettoye"] ? 'Oui' : 'Non') . '</p>
                    <p><strong>Dernier Nettoyage:</strong> ' . $row["dernier_nettoyage"] . '</p>
                    <p><strong>Salle de Bain:</strong> ' . ($row["salle_de_bain"] ? 'Oui' : 'Non') . '</p>
                    <p><strong>Toilette:</strong> ' . ($row["toilette"] ? 'Oui' : 'Non') . '</p>
                    <p><strong>Téléviseur:</strong> ' . ($row["televiseur"] ? 'Oui' : 'Non') . '</p>
                    <p><strong>Climatiseur:</strong> ' . ($row["climatiseur"] ? 'Oui' : 'Non') . '</p>
                    <p><strong>Numéro de Téléphone:</strong> ' . $row["num_telephone"] . '</p>
                    <p><strong>Description:</strong> ' . $row["description"] . '</p>
                    
                    <!-- Modify Button -->
                    <button class="btn-modifier" onclick="showModifierForm(' . $row["id"] . ')">Modifier</button>
                    <!-- End Modify Button -->

                    <!-- Modification Form (initially hidden) -->
                    <form id="form-modifier-' . $row["id"] . '" action="" method="post" style="display: none;">
                        <input type="hidden" name="chambre_id" value="' . $row["id"] . '">
                        <input type="text" name="etage" value="' . $row["etage"] . '"> Étage<br><br>
                        <input type="text" name="statut" value="' . $row["statut"] . '"> Statut<br><br>
                        <input type="text" name="capacite" value="' . $row["capacite"] . '"> Capacité<br><br>
                        <input type="text" name="type" value="' . $row["type"] . '"> Type<br><br>
                        <input type="text" name="tarif" value="' . $row["tarif"] . '"> Tarif<br><br>
                        <input type="checkbox" name="chambre_nettoye" ' . ($row["chambre_nettoye"] ? 'checked' : '') . '> Chambre Nettoyée<br><br>
                        <input type="date" name="dernier_nettoyage" value="' . $row["dernier_nettoyage"] . '"> Dernier Nettoyage<br><br>
                        <input type="checkbox" name="salle_de_bain" ' . ($row["salle_de_bain"] ? 'checked' : '') . '> Salle de Bain<br><br>
                        <input type="checkbox" name="toilette" ' . ($row["toilette"] ? 'checked' : '') . '> Toilette<br><br>
                        <input type="checkbox" name="televiseur" ' . ($row["televiseur"] ? 'checked' : '') . '> Téléviseur<br><br>
                        <input type="checkbox" name="climatiseur" ' . ($row["climatiseur"] ? 'checked' : '') . '> Climatiseur<br><br>
                        <input type="checkbox" name="telephone" ' . ($row["telephone"] ? 'checked' : '') . '> Téléphone<br><br>
                        <input type="text" name="num_telephone" value="' . $row["num_telephone"] . '"> Numéro de Téléphone<br><br>
                        <textarea name="description">' . $row["description"] . '</textarea> Description<br><br>
                        <input type="submit" value="Enregistrer">
                    </form>
                    <!-- End Modification Form -->
                </div>
            </div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>

<script>
function showModifierForm(id) {
    var form = document.getElementById('form-modifier-' + id);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>
