<?php
function controleurPrincipal($action)
{
    $lesActions                 = [];
    $lesActions["defaut"]       = "listeRestos.php";
    $lesActions["liste"]        = "listeRestos.php";
    $lesActions["detail"]       = "detailResto.php";
    $lesActions["recherche"]    = "rechercheResto.php";
    $lesActions["connexion"]    = "connexion.php";  
    $lesActions["inscription"]  = "inscription.php";
    $lesActions["deconnexion"]  = "deconnexion.php";
    $lesActions["aimer"]        = "aimer.php";
    $lesActions["supprimer"]    = "supprimer.php";
    $lesActions["modifier"]     = "modifier.php";
    $lesActions["confirmation"] = "confirmation.php";
    
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
