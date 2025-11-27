<?php
include_once "$racine/modele/bd.connexion.php";

// recuperation des donnees GET, POST, et SESSION



    // Appel de la fonction Connexion

logout();


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Déconnexion";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";
