
<!-- -------SALLES-------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equip="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
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
        <!-- <li><a href="#menu" onclick="toggleMenu();">Menu</a></li> -->
        <!-- <li><a href="#expert" onclick="toggleMenu();">Expert</a></li> -->
        <li><a href="index3.php" onclick="toggleMenu();">Nos Salles</a></li>
        <!-- <li><a href="#contact" onclick="toggleMenu();">Nous contacter</a></li> -->
        <li><a href="index2.php" onclick="toggleMenu();">Restaurant</a></li>
        <a href="#" class="btn-reserve1" onclick="toggleMenu();">Reserver</a>
    </ul>
</header>

<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>NOS SALLES</h2>
    </div>
</section>

<section class="salles" id="salles">
    <br><br>
    <div class="row">

        <div class="col50" id="gauche">
            <h2 class="titre-texte">Salles standard</h2>

            <p id="premier">Découvrez notre salle d'événement polyvalente et élégante, idéalement située pour accueillir vos réunions d'affaires, conférences, mariages et autres événements spéciaux.</p>
            <li>250 personnes </li>

            <h2 class="prix">400.000 FCFA</h2>

            <a href="#" class="btn-reserve1"  id="btn-reserve2" onclick="toggleMenu();">Réserver</a>
    
        </div>
        <div class="col50"> 
            <div class="img"> 
                <img src="images/im.jpeg" alt="image">
            </div>
        </div>
    </div>
    
    <br/>
    <br/>
    <div class="row">
        <div class="col50" id="gauche"> 
            <div class="img"> 
                <img src="images/im1.jpeg" alt="image">
            </div>
        </div>

        <div class="col50"  id="droite">
            <h2 class="titre-texte">Salle de reception</h2>
            
            <p id="deuxieme">Découvrez notre salle d'événement polyvalente et élégante, idéalement située pour accueillir vos réunions d'affaires, conférences, mariages et autres événements spéciaux.</p>
            <li>2 personnes </li>

            <h2 class="prix">450.000 FCFA</h2>

            <a href="#" class="btn-reserve1"  id="btn-reserve2" onclick="toggleMenu();">Réserver</a>
    
        </div>
        
    </div>

<br/>.

    <div class="row">

        <div class="col50" id="gauche">
            <h2 class="titre-texte">Salle de concert</h2>
            
            <p id="troisieme">Découvrez notre salle d'événement polyvalente et élégante, idéalement située pour accueillir vos réunions d'affaires, conférences, mariages et autres événements spéciaux.</p>
            <li>2 personnes </li>

            <h2 class="prix">600.000 FCFA</h2>

            <a href="#" class="btn-reserve1"  id="btn-reserve2" onclick="toggleMenu();">Réserver</a>
    
        </div>
        <div class="col50"> 
            <div class="img"> 
                <img src="images/ima3.jpeg" alt="image">
            </div>
        </div>
    </div>

    

<section class="footer">
    <div class="partie" id="premier">
        <p class="titre_footer">Teranga LODGE</p>
        <p>Adresse: Fass, Dakar, Senegal</p>
        <p>Phone number: +221772235532</p>
        <p>Email: terangalodge@gmail.com</p>
    </div>

    <div class="partie" >
        <!-- <p id="titre_footer">TERANGA LODGE</p> -->
        <div class="partie2">
            <p>A propos de nous</p>
            <p>Nos chambres</p>
            <p>Nos salles</p>
            <p>Restaurant</p>
        </div>
        
    </div>

    <div class="partie" id="partie1">
        <!-- <p class="titre_footer">TERANGA LODGE</p> -->
        <p>FACEBOOK</p>
        <p>INSTAGRAM</p>
        <p>TWITTER</p>
        <p>SNAP CHAT</p>
    </div>
</section>


</body>


</html>