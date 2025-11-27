<?php
include_once "bd.pdo.php";

function addUser($mail, $mdp, $pseudo)
{
    try {
        $connexion = connexionPDO();
        $requete   = "INSERT INTO utilisateur (mailU, mdpU, pseudoU) VALUES (:mail, :mdp, :pseudo)";
        $stmt      = $connexion->prepare($requete);
        $mail      = 'mest@bts.sio';
        $mailLower = strtolower($mail);
        //$hashedMdp = password_hash($mdp, PASSWORD_BCRYPT);
        $hashedMdp = password_hash('sio', PASSWORD_BCRYPT);
        $stmt->bindParam(':mail', $mailLower);
        $stmt->bindParam(':mdp', $hashedMdp);
        $stmt->bindParam(':pseudo', $pseudo);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}0
?>