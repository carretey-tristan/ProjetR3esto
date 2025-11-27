<?php
session_start(); // Démarre la session
include_once "$racine/modele/bd.critiquer.php";

// Récupération des données GET et SESSION
$idR = $_GET['id']; // ID du restaurant à aimer
$mailU = $_SESSION['mail']; // Adresse e-mail de l'utilisateur connecté

if (isset($_GET['id']) && isset($_SESSION['mail'])) {
    $idR = $_GET['id'];
    $mailU = $_SESSION['mail'];

    // Appeler la fonction pour supprimer la critique
    delCritiquer($idR, $mailU);
}
    // Rediriger vers la page de détail
header("Location: ./?action=detail&id=$idR");
exit();

