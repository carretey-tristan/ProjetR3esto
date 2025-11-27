<?php
session_start();
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.critiquer.php";
include_once "$racine/modele/bd.aimer.php";
include_once "$racine/modele/bd.connexion.php";

// creation du menu burger
$menuBurger   = [];
$menuBurger[] = ["url" => "#top", "label" => "Le restaurant"];
$menuBurger[] = ["url" => "#adresse", "label" => "Adresse"];
$menuBurger[] = ["url" => "#photos", "label" => "Photos"];
$menuBurger[] = ["url" => "#horaires", "label" => "Horaires"];
$menuBurger[] = ["url" => "#crit", "label" => "Critiques"];

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["id"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
if (isset($_POST['commentaire'])) {
    $mailU = $_SESSION['mail'];
    $note  = $_POST['note'];
    $commentaire = $_POST['commentaire'];
    addCritiquer($idR, $mailU, $note, $commentaire);
    header("Location: ./?action=detail&id=$idR");
}
if (isset($_POST['commentaireModif'])) {
    $mailU = $_SESSION['mail'];
    $note  = $_POST['note'];
    $commentaire = $_POST['commentaireModif'];
    updateCritique($idR, $commentaire, $note, $mailU);
    header("Location: ./?action=detail&id=$idR");
}
// traitement si necessaire des donnees recuperees
if (isset($_SESSION['mail'])){
    $critique     = getLesCritiquesByIdRAndMailU($idR, $_SESSION['mail']);
}
$lesPhotos    = getLesPhotosByIdR($idR);
$lesTypes     = getLesTypesCuisinebyIdR($idR);
$unResto      = getLeRestoByIdR($idR);
$lesCritiques = getCritiquesByIdR($idR);

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Détail d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailResto.php";
include "$racine/vue/pied.html.php";
