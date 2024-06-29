<?php
session_start();
$servername = "localhost";
$username = "Neymar";
$password = "passer";
$dbname = "Projet_Web";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Traitement de l'inscription
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO Admin (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Compte créé avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['login'])) {
        // Traitement de la connexion
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        $sql = "SELECT * FROM Admin WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_nom'] = $row['nom'];
                header("Location: layout.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun compte trouvé avec cet email.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion de l'admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Bienvenue sur votre page de connexion</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Créer un compte</h1>
                <span>ou utilisez votre email pour vous inscrire</span>
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <button type="submit" name="register">S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1>Se connecter</h1>
                <span>ou utilisez votre compte</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <a href="#">Mot de passe oublié ?</a>
                <button type="submit" name="login">Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Créer un compte administrateur!</h1>
                    <p>Remplissez le formulaire ci-dessous pour créer un compte administrateur.<p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                <h1>Bienvenue, administrateur !</h1>
<p>Connectez-vous pour accéder à votre tableau de bord administratif.</p>

                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
    <script src="connection.js"></script>
</body>
</html>
