<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PROJET</title>
</head>
<body>

<header>
    <a href="#" class="logo"><img src="images/LOGO.png" alt="Logo"></a>
    <div class="menutoggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="index.php" onclick="toggleMenu();">Accueil</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">À propos</a></li>
        <li><a href="index1.php" onclick="toggleMenu();">Nos Chambres</a></li>
        <li><a href="index3.php" onclick="toggleMenu();">Nos Salles</a></li>
        <li><a href="index2.php" onclick="toggleMenu();">Restaurant</a></li>
        <a href="Mes_Formulairessss/Formulaire_client.php" class="btn-reserve1" style="color: white; " onclick="toggleMenu();">Réserver</a>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-krZypNDcJGT9Qnyez26w0ax1zHA8N0ea65f1uBjQN2O4PTMIaNAdO+tnsW+XX2En" crossorigin="anonymous">
    </ul>
</header>

<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Bienvenue sur Teranga LODGE</h2>
        <p>Explorez nos offres de chambres confortables, de salles d'événements équipées et de tables de restaurant délicieusement préparées. Notre équipe est toute a vos dispositions.</p>
    </div>
</section>

<section class="apropos" id="apropos">
    <div class="row">
        <div class="col50" id="col50-text">
            <h2 class="titre-texte"><u>A Propos de <span>Teranga LODGE</span> </u></h2>
            <p>Notre mission est de vous offrir un service personnalisé et de qualité, que ce soit pour un séjour d'affaires, des vacances en famille ou une célébration spéciale. Nous mettons tout en œuvre pour que chaque moment passé chez nous soit inoubliable.</p>
            <p>Nos chambres sont conçues pour votre confort et notre équipe est disponible 24h/24 pour répondre à vos demandes. Nous disposons également de salles d'événements équipées pour accueillir vos réunions, conférences, mariages et autres occasions spéciales. Enfin, notre restaurant propose une cuisine raffinée et des saveurs exquises pour combler vos papilles.</p>
        </div>
        <div class="col50">
            <div class="img">
                <img src="images/télécharger (10).jpeg" alt="Image">
            </div>
        </div>
    </div>
</section>

<section class="restaurant" id="restaurant">
    <div class="titre">
        <h3>Restaurant</h3>
        <p>Notre chef talentueux s'inspire des saveurs locales et des ingrédients frais pour créer des plats savoureux qui raviront vos sens. Que vous soyez passionné de cuisine traditionnelle, curieux d'explorer de nouvelles saveurs ou à la recherche d'une expérience gastronomique haut de gamme, notre menu saura satisfaire toutes vos envies.</p>
    </div>
</section>

<section class="galerie" id="galerie">
    <h2>Notre Galerie</h2>
    <div class="carousel-container">
        <img src="images/back.png" alt="Back" id="backBtn" class="arrow left">
        <div class="carousel">
            <div class="img">
                <img src="images/729750-restaurant-bar-wallpaper-modern-restaurant-1440x900-wallpaper-teahubio.jpg" alt="Image">
            </div>
            <div class="img">
                <img src="images/hotel-room.jpg" alt="Image">
            </div>
            <div class="img">
                <img src="images/8e8ea07cc3de0e11d49a8e52f8ee6a54.jpeg" alt="Image">
            </div>
        </div>
        <img src="images/next.png" alt="Next" id="nextBtn" class="arrow right">
    </div>
    <br><br>
    <a href="Mes_Formulairessss/Formulaire_client.php" class="btn-reserve1" id="btn-reserve2">Réserver</a>
</section>




<!-- ------------------------------------------ -->


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


<!-- --------------------------------------------- -->

<script>
    function toggleMenu() {
        const menutoggle = document.querySelector('.menutoggle');
        const navbar = document.querySelector('.navbar');
        menutoggle.classList.toggle('active');
        navbar.classList.toggle('active');
    }
</script>

<script>document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const images = document.querySelectorAll('.carousel .img');
    const nextBtn = document.getElementById('nextBtn');
    const backBtn = document.getElementById('backBtn');

    let currentIndex = 0;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    nextBtn.addEventListener('click', () => {
        if (currentIndex < images.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    });

    backBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = images.length - 1;
        }
        updateCarousel();
    });
});
</script>

</body>
</html>
