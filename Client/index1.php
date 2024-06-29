<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>PROJET</title>
</head>
<body>

<header>
    <a href="#" class="logo"><img src="images/LOGO.png" alt=""></a>
    <div class="menutoggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="index.php" onclick="toggleMenu();">Accueil</a></li>
        <li><a href="index.php#apropos" onclick="toggleMenu();">A propos</a></li>
        <li><a href="index1.php" onclick="toggleMenu();">Nos Chambres</a></li>
        <li><a href="index3.php" onclick="toggleMenu();">Nos Salles</a></li>
        <li><a href="index2.php" onclick="toggleMenu();">Restaurant</a></li>
        <a href="#" style="color: white;" class="btn-reserve1" onclick="toggleMenu();">Réserver</a>
    </ul>
</header>

<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>NOS CHAMBRES</h2>
    </div>
</section>

<section class="chambres" id="chambres">
    <div class="row">
        <!-- Chambre 1 -->
        <div class="col50" id="gauche">
            <h2 class="titre-texte"><u><span>C</span>hambre <span>s</span>tandard</u></h2>
            <ul>
                <li>1 salle de bain</li>
                <li>2 lits</li>
                <li>2 personnes </li>
            </ul>
            <h2 class="prix">150.000 FCFA par nuit</h2>
        </div>
        <div class="col50"> 
            <div class="img"> 
                <img src="images/chambre1.jpeg" alt="image">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chambre 2 -->
        <div class="col50"> 
            <div class="img"> 
                <img src="images/chambre2.jpeg" alt="image">
            </div>
        </div>
        <div class="col50" id="droite">
            <h2 class="titre-texte"><u><span>C</span>hambre <span>s</span>tandard</u></h2>
            <ul>
                <li>1 salle de bain</li>
                <li>2 lits</li>
                <li>2 personnes </li>
            </ul>
            <h2 class="prix">150.000 FCFA par nuit</h2>
        </div>
    </div>

    <div class="row">
        <!-- Chambre 3 -->
        <div class="col50" id="gauche">
            <h2 class="titre-texte"><u><span>C</span>hambre <span>s</span>tandard</u></h2>
            <ul>
                <li>1 salle de bain</li>
                <li>2 lits</li>
                <li>2 personnes </li>
            </ul>
            <h2 class="prix">150.000 FCFA par nuit</h2>
        </div>
        <div class="col50"> 
            <div class="img"> 
                <img src="images/chambre3.jpeg" alt="image">
            </div>
        </div>
    </div>
</section>

<section class="footer">
    <div class="partie" id="premier">
        <p class="titre_footer">Teranga LODGE</p>
        <p>Adresse: Fass, Dakar, Senegal</p>
        <p>Phone number: +221772235532</p>
        <p>Email: terangalodge@gmail.com</p>
    </div>

    <div class="partie">
        <div class="partie2">
            <p>A propos de nous</p>
            <p>Nos chambres</p>
            <p>Nos salles</p>
            <p>Restaurant</p>
        </div>
    </div>

    <div class="partie" id="partie1">
        <p>FACEBOOK</p>
        <p>INSTAGRAM</p>
        <p>TWITTER</p>
        <p>SNAP CHAT</p>
    </div>
</section>

<script>
    function toggleMenu() {
        // Toggle logic here
    }
</script>

</body>
</html>
