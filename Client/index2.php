<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equip="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
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
        <a href="#" style="color:white; border-radius: 10px;" class="btn-reserve1" onclick="toggleMenu();">Reserver</a>
    </ul>
</header>


<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>RESTAURANT</h2>
    </div>
</section>


<section class="menu" id="menu">

    <h2 class="grand-titre">Menu</h2>

        <div class="row1">
            <img src="images/back.png" alt="image" id="backBtn">
            <div class="col50">
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut1.jpeg" alt="image">
                        
                        <div class="description">
                            <h2>Entrée</h2>
                            <p>Fennel-Burrata-Salad</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                    
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut2.jpeg" alt="image">
                        
                        <div class="description">
                            <h2>Résistance</h2>
                            <p>Steak-Burger-Thiep</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut3.jpeg" alt="image">
                        
                        <div class="description">
                            <h2>Dessert</h2>
                            <p>Macaron-Tiramisu-Muffin</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                </div>
                
            </div>            
            
            <img src="images/next.png" alt="image" id="nextBtn">

        </div>

        <div class="row1">
            <img src="images/back.png" alt="image" id="backBtn">
            <div class="col50">
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut1.jpeg" alt="image">
                        
                        <div class="description">
                            <h2 class="type">Entrée</h2>
                            <p>Fennel-Burrata-Salad</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                    
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut2.jpeg" alt="image">
                        
                        <div class="description">
                            <h2>Résistance</h2>
                            <p>Steak-Burger-Thiep</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/restaut3.jpeg" alt="image">
                        
                        <div class="description">
                            <h2>Dessert</h2>
                            <p>Macaron-Tiramisu-Muffin</p>
                            <p><span>25000 FCFA - 50000 FCFA</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <img src="images/next.png" alt="image" id="nextBtn">

        </div>
        
        <!-- <a href="#" class="btn-reserve1" id="btn-reserve2" onclick="toggleMenu();">Reserver</a> -->
</section>


<section class="table" id="table">

    <h2 class="grand-titre">Tables</h2>
    
        <div class="row1">
            <img src="images/back.png" alt="image" id="backBtn">
            <div class="col50">
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/table1.jpeg" alt="image">
                    </div>
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/table2.jpeg" alt="image">
                    </div>
                </div>
        
                <div class="col50"> 
                    <div class="img"> 
                        <img src="images/table3.jpeg" alt="image">
                    </div>
                </div>
            </div>
            
            <img src="images/next.png" alt="image" id="nextBtn">
    
        </div>
        
        <!-- <a href="#" class="btn-reserve1" id="btn-reserve2" onclick="toggleMenu();">Reserver</a> -->
</section>


<section class="infos">
    <div class="section" >
        <h1>Nous offrons ausi:</h1>
        <p>Service de livraison</p>
        <p>Wi-fi Gratuit</p>
        <p>Securite adequate</p>
    </div>

    <div class="section" id="section1">
        <p>Mets delicieux</p>
        <p>Climatisation dans toutes les pieces</p>
        <p>Services de chambre</p>
    </div>

    <div class="section" id="section1">
        <p>Transferts prives/Transferts en navette</p>
        <p>Equipements pour bebes et enfants</p>
    </div>
</section>


<section class="footer">
            <div class="partie" id="premier">
                <p class="titre_footer">Teranga LODGE</p>
                <p>Adresse: Fass, Dakar, Senegal</p>
                <p>Phone number: +221772235532</p>
                <p>Email: terangalodge@gmail.com</p>
            </div>
        
            <div class="partie" id="partie1">
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
        
        

<!-- <script>
    let scrollContainer = document.querySelector(".gallery");
    let backBtn = document.getElementById(".backBtn");
    let nextBtn = document.getElementById(".nextBtn");

    scrollContainer.addEventListener("wheel", (evt) => {
        evt.preventDefault();
        scrollContainer.scrollLeft += evt.deltaY;
        scrollContainer.style.scrollBehavior = "auto";
    });

    nextBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft += 900;
    });

    backBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft -= 900;
    });


</script> -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
    let scrollContainer = document.querySelector(".row1");
    let backBtn = document.getElementById("backBtn");
    let nextBtn = document.getElementById("nextBtn");

    scrollContainer.addEventListener("wheel", (evt) => {
        evt.preventDefault();
        scrollContainer.scrollLeft += evt.deltaY;
        scrollContainer.style.scrollBehavior = "auto";
    });

    nextBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft += 900;
    });

    backBtn.addEventListener("click", () => {
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft -= 900;
    });
});

</script>

<!--

<div class="copyright">
    <p>copyright 2021<a href="#">Aida Magou </a>youtube tutoriel. Tous drois reserve</p>
</div>


<script type="text/javascript">
    window.addEventListener('scroll', function(){
        const header =document.querySelector('header');
        header.classList.toggle("sticky", window.scrolly > 0);
    });

    function toggleMenu()
    {
        const toggleMenu = document.querySelector('.menutoggle');
        const navbar = document.querySelector('.navbar');
        menutoggle.classList.toggle('active');
        navbar.classList.toggle('active');
    }
</script>
</body>


</html>