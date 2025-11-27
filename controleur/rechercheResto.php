<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.critiquer.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.connexion.php";
 
// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");
 
// recuperation des donnees GET, POST, et SESSION
$critere = $_GET['critere'] ?? 'nom';
$nomR = $_POST['nom'] ?? '';
$voieAdrR = $_POST['rue'] ?? '';
$cpR = $_POST['cp'] ?? '';
$villeR = $_POST['ville'] ?? '';
$tabIdTC = $_POST['tabTypesC'] ?? [];
 
     // on récupère le critère en GET dans l'URL (critere de recherche par defaut : nom) : $critere
     // on récupère les variables des formulaires : $nomR, $villeR, $cpR, $voieAdR, $tabIdTC[]
 
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
     // on appelle les fonctions utiles en fonction du type de recherche
     
     switch($critere){
          case 'nom':
               $lesRestos = getLesRestosByNomR($nomR);
               break;
          case 'adresse':
               $lesRestos = getLesRestosByAdresse($voieAdrR, $cpR, $villeR);
               break;
          case 'type':
               $lesTypesC = getLesTypesCuisine();
               $lesRestos = getLesRestosByTC($tabIdTC);
               break;
          // recherche par type de cuisine
      }
 
// traitement si necessaire des donnees recuperees
;
 
// appel du script de vue qui permet de gerer l'affichage des donnees
 
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheResto.php";
if (!empty($_POST)) {
     
    // affichage des résultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
include "$racine/vue/pied.html.php";
?>