<?php
include_once "$racine/modele/bd.connexion.php";
include_once "$racine/modele/bd.inscription.php";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST['mailU'], $_POST['mdpU'])) {
    $util = $_POST['mailU'];
    $mdp = $_POST['mdpU'];

    // Appel de la fonction Connexion
    login($util, $mdp);
    

} else {
    $result = null;
}


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Connexion ";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";
