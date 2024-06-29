<!DOCTYPE html>
<html>
<head>
<title>Formulaire </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-list/2.10.0/country-list.min.js"></script>

</head>
<body>
<?php
session_start();
?>


    <!------MON BANNERR------>
    <div class="container ">
      <div class="width-50">
        <div class="banner-section">
          <div style="width: 646px; display: flex; flex-direction: column;">
            <div style="color: white; font-size: 40px; font-family: Poppins; font-weight: bold; word-wrap: break-word;">Veuillez saisir vos</div>
            <div style="color: #C94842; font-size: 40px; font-family: Poppins; font-weight: bold; word-wrap: break-word;">informations !</div>
        </div>
                  <div><img src="LOGO.png" alt="logo"></div>
          <div class="contact-info">
            <div>
              <i class="fa fa-envelope"></i>
              <span>terangaLodge@gmail.com</span>
            </div>
            <div>
              <i class="fa fa-phone"></i>
              <span>+221 77 223 55 32</span>
            </div>
            <div>
              <i class="fa fa-map-marker"></i>
              <span>Fass, Dakar, Sénégal</span>
            </div>
          </div>
          
          
         
        </div>
      </div>
      <div class="width-50">
        <form action="Enregistrer_client.php" method="POST">
          <input type="text" id="nom" name="nom" required placeholder="Votre nom"><br><br>
      
          <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom"><br><br>
      
          <select id="civilite" name="civilite" required>
            <option value="" disabled selected hidden>Civilité</option>
            <option value="Monsieur">Monsieur</option>
            <option value="Madame">Madame</option>
          </select><br><br>
      
          <input type="tel" id="telephone" name="telephone" required placeholder="Numéro de téléphone"><br><br>
      
          <input type="email" id="email" name="email" required placeholder="Email"><br><br>
      
          <input type="text" id="adresse" name="adresse" required placeholder="Adresse"><br><br>
      
          <input type="text" id="ville" name="ville" required placeholder="Ville"><br><br>
      
          <input type="text" id="code_postal" name="code_postal" required placeholder="Code Postal"><br><br>
      
          <select id="pays" name="pays" required>
            <option value="" disabled selected hidden> Votre pays de résidence</option>
        </select>
              
          <input type="submit" value="Envoyer">
        </form>
      </div>
      
      
      
    </div>
  

  
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          var select = document.getElementById("pays");
  
          // Appel à l'API de Rest Countries pour obtenir la liste des pays
          fetch("https://restcountries.com/v3.1/all")
              .then(response => response.json())
              .then(data => {
                  data.forEach(country => {
                      var option = document.createElement("option");
                      option.text = country.name.common;
                      option.value = country.name.common;
                      select.appendChild(option);
                  });
              })
              .catch(error => console.error("Erreur lors de la récupération des pays :", error));
      });
  </script>
  
  
 </body>
  </html>