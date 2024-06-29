<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['admin_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: Connection.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="layout.css" />
  <script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>
</head>
<body>
<input type="checkbox" id="menu_checkbox" />
<!-- HEADER -->
<header class="header">
  <!-- FLEX-LEFT -->
  <div class="flex-left">
    
    <div class="icons">
      <div>
        <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
    </div>
  </div>
  <!-- FLEX-RIGHT -->
  <div class="flex-right">
    <div class="logo">
      <img src="admin.png" class="image" alt="Admin" />
      <div class="info">
        <p><?php echo $_SESSION['admin_nom']; ?></p>
        <small id="user-btn">
          Administrateur <i class="fa fa-angle-down" aria-hidden="true"></i>
        </small>
      </div>
    </div>
  </div>
  <div class="profile">
    <div class="flex-btn">
      <form action="deconnexion.php" method="post">
        <button type="submit" class="option-btn" name="deconnexion">
          <i class="fa fa-power-off" aria-hidden="true"></i> Se déconnecter
        </button>
      </form>
    </div>
  </div>
</header>

  <!-- side-bar -->
  <div class="side-bar">
    <div class="logo">
      <img src="logo.png" class="image" alt="Logo" />
      <h3 class="menu">- MENU</h3>
    </div>
    <nav class="navbar">
    <a href="#" id="gerer-reservations-link"><i class="fa fa-ticket" aria-hidden="true"></i><span>Gérer les réservations</span></a>
    <a href="#" id="gerer-chambres-link"><i class="fa fa-bed" aria-hidden="true"></i><span>Gérer les chambres</span></a>
      <a href="#" id="gerer-salles-link"><i class="fa fa-calendar" aria-hidden="true"></i><span>Gérer les salles d'événements</span></a>
      <a href="#"><i class="fa fa-cutlery" aria-hidden="true"></i><span>Restauration</span></a>
    </nav>
  </div>
  <section class="home-section">
    <div class="title">
      <div class="left">
        <h1 class="dashboard-title">Dashboard Admin</h1>
      </div>
    </div>  
    <div class="welcome-message">
      <h2>Bienvenue sur votre tableau de bord d'administration, <?php echo $_SESSION['admin_nom']; ?>!</h2>
      <p>Gérez facilement les chambres, les réservations et bien plus encore.</p>
    </div>

    <div class="contttt">
      <!-- Contenu dynamique -->
      <div id="gerer-chambres" class="hidden">
        <div class="options">
          <button class="option-button" id="ajouter-chambre">Ajouter chambre</button>
          <button class="option-button" id="modifier-chambre">Modifier chambre</button>
          <button class="option-button" id="supprimer-chambre">Supprimer chambre</button>
        </div>
        <div class="animation-content">
          <div id="ajouter-chambre-form" class="hidden">
            <h2>Ajouter une chambre</h2>
            <form action="ajouter_chambre.php" method="post">
              <!-- Formulaire d'ajout de chambre -->
              <div class="form-group">
                <label for="photo">Nom de la photo :</label>
                <input type="text" id="photo" name="photo" required>
                <small>Entrez le nom de l'image (ex: photo.jpg)</small>
              </div>
              <div class="form-group">
                <label for="etage">Étage :</label>
                <input type="number" id="etage" name="etage" required>
              </div>
              <div class="form-group">
                <label for="statut">Statut :</label>
                <input type="text" id="statut" name="statut" required>
              </div>
              <div class="form-group">
                <label for="capacite">Capacité :</label>
                <input type="number" id="capacite" name="capacite" required>
              </div>
              <div class="form-group">
                <label for="type_chambre">Type de chambre :</label>
                <select id="type_chambre" name="type_chambre" required>
                  <option value="">Sélectionner le type</option>
                  <option value="single">Single</option>
                  <option value="double">Double</option>
                  <option value="suite">Suite</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tarif">Tarif par nuit (EUR) :</label>
                <input type="number" id="tarif" name="tarif" step="0.01" required>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="chambre_nettoye" name="chambre_nettoye">
                <label for="chambre_nettoye">Chambre nettoyée</label>
              </div>
              <div class="form-group">
                <label for="dernier_nettoyage">Dernier nettoyage :</label>
                <input type="date" id="dernier_nettoyage" name="dernier_nettoyage">
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="salle_de_bain" name="salle_de_bain">
                <label for="salle_de_bain">Salle de bain</label>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="toilette" name="toilette">
                <label for="toilette">Toilette</label>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="televiseur" name="televiseur">
                <label for="televiseur">Téléviseur</label>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="climatiseur" name="climatiseur">
                <label for="climatiseur">Climatiseur</label>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="telephone" name="telephone">
                <label for="telephone">Téléphone</label>
              </div>
              <div class="form-group">
                <label for="num_telephone">Numéro de téléphone :</label>
                <input type="text" id="num_telephone" name="num_telephone">
              </div>
              <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" rows="4" required></textarea>
              </div>
              <button type="submit" class="submit-btn">Ajouter chambre</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="supprimer-chambre-form" class="hidden">
      <div id="chambres-list"></div>
    </div>
  </div>
  <div id="modifier-chambre-form" class="hidden">
    <div id="chambres-list-modifier"></div>
  </div>

  <div id="gerer-salles" class="hidden">
    <div class="options">
      <!-- Ajoutez ici les boutons spécifiques aux salles d'événements -->
      <button class="option-button" id="ajouter-salle">Ajouter salle</button>
      <button class="option-button" id="modifier-salle">Modifier salle</button>
      <button class="option-button" id="supprimer-salle">Supprimer salle</button>
    </div>
    <div class="animation-content">
      <!-- Contenu dynamique pour ajouter/modifier/supprimer des salles d'événements -->
      <div id="ajouter-salle-form" class="hidden">
        <!-- Formulaire d'ajout de salle d'événement -->
        <h2>Ajouter une salle d'événement</h2>
        <form action="ajouter_salle.php" method="post">
    <!-- Champ pour le type de salle -->
    <div class="form-group">
      <label for="type">Type de salle :</label>
      <select id="type" name="type" required>
        <option value="">Sélectionner le type de salle</option>
        <option value="Salle de réception">Salle de réception</option>
        <option value="Salle de conférence">Salle de conférence</option>
        <option value="Salle de réunion">Salle de réunion</option>
        <option value="Salle de banquet">Salle de banquet</option>
        <!-- Ajoutez d'autres options selon vos besoins -->
      </select>
    </div>

    <!-- Champ pour le nombre de personnes -->
    <div class="form-group">
      <label for="nbr_personnes">Nombre de personnes :</label>
      <input type="number" id="nbr_personnes" name="nbr_personnes" required>
    </div>

    <!-- Champ pour la description -->
    <div class="form-group">
      <label for="description">Description :</label>
      <textarea id="description" name="description" rows="4" required></textarea>
    </div>

    <!-- Champ pour le tarif -->
    <div class="form-group">
      <label for="tarif">Tarif (EUR) :</label>
      <input type="number" id="tarif" name="tarif" step="0.01" required>
    </div>

    <!-- Champ pour la photo -->
    <div class="form-group">
      <label for="photo">Nom de la photo :</label>
      <input type="text" id="photo" name="photo" required>
      <small>Entrez le nom de l'image (ex: photo.jpg)</small>
    </div>

    <!-- Bouton de soumission -->
    <button type="submit" class="submit-btn">Ajouter salle</button>
  </form>
      </div>
    </div>
  </div>
  <div id="supprimer-salle-form" class="hidden">
    <div id="salles-list"></div>
  </div>
  <div id="modifier-salle-form" class="hidden">
  <div id="salles-list-modifier"></div>
</div>

<div id="gerer-reservations" class="hidden">
    <div class="options">
      <button class="option-button" id="reservations-chambres-btn">Réservations Chambres</button>
      <button class="option-button" id="reservations-salles-btn">Réservations Salles</button>
      <button class="option-button" id="reservations-table-btn">Réservations Tables</button>
    </div>
  </div>
</div>
<div id="reservations-chambres-list" class="animation-content">
        <!-- Contenu des réservations de chambres sera inséré ici -->
    </div>
</div>


  <footer class="footer">
    <div class="footer-content">
      <img src="logo.png" alt="Logo Teranga Lodge" class="footer-logo">
      <div class="footer-text">&copy; Teranga Lodge - Tous droits réservés</div>
    </div>
  </footer>
</section>
<script src="layout.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Récupérer le bouton "Ajouter chambre"
    var ajouterChambreBtn = document.getElementById('ajouter-chambre');

    // Récupérer le formulaire d'ajout de chambre
    var formulaireAjoutChambre = document.getElementById('ajouter-chambre-form');

    // Ajouter un écouteur d'événement au clic sur le bouton "Ajouter chambre"
    ajouterChambreBtn.addEventListener('click', function() {
      // Afficher ou cacher le formulaire en basculant la classe 'hidden'
      formulaireAjoutChambre.classList.toggle('hidden');
    });

    // Gestion de l'affichage des chambres pour la suppression
    var supprimerChambreBtn = document.getElementById('supprimer-chambre');
    var supprimerChambreForm = document.getElementById('supprimer-chambre-form');
    var chambresList = document.getElementById('chambres-list');

    supprimerChambreBtn.addEventListener('click', function() {
      supprimerChambreForm.classList.toggle('hidden');
      if (!supprimerChambreForm.classList.contains('hidden')) {
        fetch('fetch_chambres.php')
          .then(response => response.text())
          .then(data => {
            chambresList.innerHTML = data;
          });
      }
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Récupérer le bouton "Modifier chambre"
    var modifierChambreBtn = document.getElementById('modifier-chambre');

    // Récupérer le formulaire de modification de chambre
    var formulaireModifierChambre = document.getElementById('modifier-chambre-form');
    var chambresListModifier = document.getElementById('chambres-list-modifier');

    // Ajouter un écouteur d'événement au clic sur le bouton "Modifier chambre"
    modifierChambreBtn.addEventListener('click', function() {
      // Afficher ou cacher le formulaire en basculant la classe 'hidden'
      formulaireModifierChambre.classList.toggle('hidden');
      if (!formulaireModifierChambre.classList.contains('hidden')) {
        fetch('fetch_chambres_modifier.php')
          .then(response => response.text())
          .then(data => {
            chambresListModifier.innerHTML = data;
          });
      }
    });
  });
</script>
<script>document.addEventListener('DOMContentLoaded', function() {
  // Récupérer le bouton "Ajouter salle"
  var ajouterSalleBtn = document.getElementById('ajouter-salle');

  // Récupérer le formulaire d'ajout de salle
  var formulaireAjoutSalle = document.getElementById('ajouter-salle-form');

  // Ajouter un écouteur d'événement au clic sur le bouton "Ajouter salle"
  ajouterSalleBtn.addEventListener('click', function() {
    // Afficher ou cacher le formulaire en basculant la classe 'hidden'
    formulaireAjoutSalle.classList.toggle('hidden');
  });
});
</script>
<script>document.addEventListener('DOMContentLoaded', function() {
  // Récupérer le bouton "Supprimer salle"
  var supprimerSalleBtn = document.getElementById('supprimer-salle');

  // Récupérer le formulaire de suppression de salle
  var supprimerSalleForm = document.getElementById('supprimer-salle-form');
  var sallesList = document.getElementById('salles-list');

  // Ajouter un écouteur d'événement au clic sur le bouton "Supprimer salle"
  supprimerSalleBtn.addEventListener('click', function() {
    supprimerSalleForm.classList.toggle('hidden');
    if (!supprimerSalleForm.classList.contains('hidden')) {
      fetch('fetch_salles.php') // Assurez-vous d'avoir un script PHP pour récupérer les données des salles à supprimer
        .then(response => response.text())
        .then(data => {
          sallesList.innerHTML = data; // Insérer les données des salles dans la liste
        });
    }
  });
});
</script>
<script>document.addEventListener('DOMContentLoaded', function() {
  const modifierSalleBtn = document.getElementById('modifier-salle');
  const formulaireModifierSalle = document.getElementById('modifier-salle-form');
  const sallesListModifier = document.getElementById('salles-list-modifier');

  modifierSalleBtn.addEventListener('click', function() {
    formulaireModifierSalle.classList.toggle('hidden');
    if (!formulaireModifierSalle.classList.contains('hidden')) {
      fetch('fetch_salles_modifier.php')
        .then(response => response.text())
        .then(data => {
          sallesListModifier.innerHTML = data;
          // Ajoutez ici la logique pour gérer l'événement de clic sur le bouton "Modifier"
          // Par exemple, vous pouvez ajouter un événement onclick à chaque bouton "Modifier"
          // pour lancer une action spécifique.
          // Exemple :
          // var modifierButtons = sallesListModifier.querySelectorAll('.modifier-button');
          // modifierButtons.forEach(button => {
          //   button.addEventListener('click', function() {
          //     // Logique pour l'action de modification
          //   });
          // });
        });
    }
  });
});
</script>
<script>// Écouteurs d'événements pour chaque bouton d'option de réservation
  const reservationsChambresBtn = document.getElementById('reservations-chambres-btn');
  const reservationsSallesBtn = document.getElementById('reservations-salles-btn');
  const reservationsTableBtn = document.getElementById('reservations-table-btn');

  reservationsChambresBtn.addEventListener('click', function() {
    // Logique pour gérer les réservations de chambres
    console.log("Gérer les réservations de chambres");
  });

  reservationsSallesBtn.addEventListener('click', function() {
    // Logique pour gérer les réservations de salles
    console.log("Gérer les réservations de salles");
  });

  reservationsTableBtn.addEventListener('click', function() {
    // Logique pour gérer les réservations de tables
    console.log("Gérer les réservations de tables");
  });
</script>
<script>document.addEventListener('DOMContentLoaded', function() {
  // Récupérer le bouton "Réservations Chambres"
  var reservationsChambresBtn = document.getElementById('reservations-chambres-btn');

  // Récupérer la liste des réservations de chambres
  var reservationsChambresList = document.getElementById('reservations-chambres-list');

  // Ajouter un écouteur d'événement au clic sur le bouton "Réservations Chambres"
  reservationsChambresBtn.addEventListener('click', function() {
    // Charger dynamiquement les réservations de chambres depuis fetch_reservations_chambres.php
    fetch('fetch_reservations_chambres.php')
      .then(response => response.text())
      .then(data => {
        reservationsChambresList.innerHTML = data; // Insérer les réservations dans la liste des réservations
      });

    // Afficher la liste des réservations de chambres en retirant la classe 'hidden'
    reservationsChambresList.classList.remove('hidden');
  });
});

</script>
</body>
</html>