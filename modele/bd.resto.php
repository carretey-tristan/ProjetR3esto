<?php
include_once "bd.pdo.php";
function getLesRestos()
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from resto");
        $req->execute();
        $lesRestos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesRestos;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLeRestoByIdR($idR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from resto where idR=:idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $leResto = $req->fetch(PDO::FETCH_OBJ);
        return $leResto;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesRestosByNomR($nomR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from resto where nomR like :nomR");
        $req->bindValue(':nomR', "%$nomR%");
        $req->execute();
        $lesRestos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesRestos;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesRestosByAdresse( $voieAdrR, $cpR, $villeR)
{
    try {
        // A COMPLETER
        $connex = connexionPDO();
        $req    = $connex->prepare("select * from resto where voieAdrR like :voieAdrR and cpR like :cpR and villeR like :villeR");
        $req->bindValue(':voieAdrR', "%$voieAdrR%");
        $req->bindValue(':cpR', "%$cpR%");
        $req->bindValue(':villeR', "%$villeR%");
        $req->execute();
        $lesRestos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesRestos;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getLesRestosByTC($tabIdTC){
    if (count($tabIdTC) > 0) {
        $filtre = "(";
        foreach($tabIdTC as $idTC){
            $filtre .= "$idTC,";
        }
        $filtre .= "null)";
 
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("select distinct resto.* from resto inner join proposer on resto.idR=proposer.idR where idTC IN $filtre");
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }else{
        return false;
    }
}