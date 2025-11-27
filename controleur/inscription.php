<?php
include_once "$racine/modele/bd.inscription.php";
include_once "$racine/modele/bd.connexion.php";
// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
if (isset($_POST['mailU']) && isset($_POST['mdpU']) && isset($_POST['nomU'])) {
    $mailU = $_POST['mailU'];
    $mdpU  = $_POST['mdpU'];
    $nomU  = $_POST['nomU'];

    // Appeler la fonction pour ajouter l'utilisateur
    addUser($mailU, $mdpU, $nomU);
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des restaurants répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueInscription.php";
include "$racine/vue/pied.html.php";
