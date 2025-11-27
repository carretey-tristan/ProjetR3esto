<?php
include_once "bd.pdo.php";
function getLesTypesCuisinebyIdR($idR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from typecuisine INNER JOIN proposer on typecuisine.idTC = proposer.idTC where idR=:idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesTypes = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesTypes;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesTypesCuisine()
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from typecuisine ");
        $req->execute();
        $lesTypes = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesTypes;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

