<?php
include_once "bd.pdo.php";
function getLesPhotosByIdR($idR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from photo where idR=:idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesPhotos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesPhotos;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLaPhotosByIdR($idR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from photo where idR=:idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesPhotos = $req->fetch(PDO::FETCH_OBJ);
        return $lesPhotos;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
