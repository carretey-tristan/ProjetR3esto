<?php
include_once "bd.pdo.php";

function getLeUtilisateurByMailU($mailU) {
    try {
        $connexion = connexionPDO();
        $requete   = "SELECT * FROM utilisateur WHERE mailU = :util";
        $stmt      = $connexion->prepare($requete);
        $stmt->bindParam(':util', $mailU); 
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result; // Retournez le résultat
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}

?>