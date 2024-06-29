let profile = document.querySelector('.header .profile');

document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   search.classList.remove('active');
}

let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () => {
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () => {
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if (darkMode === 'enabled') {
   enableDarkMode();
}

toggleBtn.onclick = (e) => {
   darkMode = localStorage.getItem('dark-mode');
   if (darkMode === 'disabled') {
      enableDarkMode();
   } else {
      disableDarkMode();
   }
}
document.addEventListener('DOMContentLoaded', function() {
   const gererChambresLink = document.getElementById('gerer-chambres-link');
   const gererChambresSection = document.getElementById('gerer-chambres');
   const animationContent = document.querySelector('.animation-content');
 
   gererChambresLink.addEventListener('click', function(e) {
     e.preventDefault();
     gererChambresSection.classList.toggle('hidden');
     animationContent.classList.add('fade-in');
     setTimeout(() => {
       animationContent.classList.remove('fade-in');
     }, 500);
   });
 
   // Vous pouvez ajouter des événements supplémentaires ici pour les boutons "Ajouter chambre", "Modifier chambre" et "Supprimer chambre"
 });
 document.addEventListener('DOMContentLoaded', function() {
   const gererSallesLink = document.getElementById('gerer-salles-link');
   const gererSallesSection = document.getElementById('gerer-salles'); // Id à utiliser pour le contenu dynamique des salles d'événements
   const animationContent = document.querySelector('.animation-content');
 
   gererSallesLink.addEventListener('click', function(e) {
     e.preventDefault();
     gererSallesSection.classList.toggle('hidden');
     animationContent.classList.add('fade-in');
     setTimeout(() => {
       animationContent.classList.remove('fade-in');
     }, 500);
   });
 
   // Vous pouvez ajouter des événements supplémentaires ici pour les boutons spécifiques aux salles d'événements
 });
 
 document.addEventListener('DOMContentLoaded', function() {
   const gererReservationsLink = document.getElementById('gerer-reservations-link');
   const gererReservationsSection = document.getElementById('gerer-reservations');
   const animationContent = document.querySelector('.animation-content');

   gererReservationsLink.addEventListener('click', function(e) {
     e.preventDefault();
     gererReservationsSection.classList.toggle('hidden');
     animationContent.classList.add('fade-in');
     setTimeout(() => {
       animationContent.classList.remove('fade-in');
     }, 500);
   });
});