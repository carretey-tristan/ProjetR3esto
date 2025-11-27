<?php
session_start(); // Démarre la session
include_once "$racine/modele/bd.aimer.php";

// Récupération des données GET et SESSION
$idR = $_GET['id']; // ID du restaurant à aimer
$mailU = $_SESSION['mail']; // Adresse e-mail de l'utilisateur connecté

// Vérifiez si l'utilisateur a déjà aimé le restaurant
$aimer = getAimerById($mailU, $idR);

if ($aimer) {
    delAimer($mailU, $idR); 
} else { 
    addAimer($mailU, $idR); 
}

// Redirection vers la page de détail
header("Location: ./?action=detail&id=$idR");
