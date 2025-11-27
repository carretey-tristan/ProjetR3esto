<?php
include_once "bd.pdo.php";

function getAimerById($mailU, $idR) {
    try {
        $connexion = connexionPDO();
        $requete   = "SELECT * FROM aimer WHERE mailU = :mailU AND idR = :idR";
        $stmt      = $connexion->prepare($requete);
        $stmt->bindParam(':mailU', $mailU);
        $stmt->bindParam(':idR', $idR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}


function addAimer($mailU, $idR) {
    try {
        $connexion = connexionPDO();
        $requete   = "INSERT INTO aimer (mailU, idR) VALUES (:mailU, :idR)";
        $stmt      = $connexion->prepare($requete);
        $stmt->bindParam(':mailU', $mailU);
        $stmt->bindParam(':idR', $idR);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}


function delAimer($mailU, $idR) {
    try {
        $connexion = connexionPDO();
        $requete   = "DELETE FROM aimer WHERE mailU = :mailU AND idR = :idR";
        $stmt      = $connexion->prepare($requete);
        $stmt->bindParam(':mailU', $mailU);
        $stmt->bindParam(':idR', $idR);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }   
}

?>