<?php
include_once "bd.pdo.php";
function getCritiquesByIdR($idR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from critiquer where idR=:idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesCritiques = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesCritiques;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delCritiquer($idR, $mailU){
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("delete from critiquer where idR=:idR and mailU=:mailU");
        $req->bindValue(':idR', $idR);
        $req->bindValue(':mailU', $mailU);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addCritiquer($idR, $mailU, $note, $commentaire){
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("insert into critiquer (idR, mailU, note, commentaire) values (:idR, :mailU, :note, :commentaire)");
        $req->bindValue(':idR', $idR);
        $req->bindValue(':mailU', $mailU);
        $req->bindValue(':note', $note);
        $req->bindValue(':commentaire', $commentaire);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesCritiquesByIdRAndMailU($idR, $mailU)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from critiquer where idR=:idR and mailU=:mailU");
        $req->bindValue(':idR', $idR);
        $req->bindValue(':mailU', $mailU);
        $req->execute();
        $lesCritiques = $req->fetch(PDO::FETCH_OBJ);
        return $lesCritiques;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updateCritique($idR, $commentaire, $note, $mailU) {
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("UPDATE critiquer SET commentaire = :commentaire, note = :note WHERE idR = :idR AND mailU = :mailU");
        $req->bindValue(':idR', $idR);
        $req->bindValue(':mailU', $mailU);
        $req->bindValue(':commentaire', $commentaire);
        $req->bindValue(':note', $note);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


?>