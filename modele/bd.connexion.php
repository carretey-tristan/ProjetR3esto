<?php
include_once "bd.pdo.php";
include_once "bd.utilisateur.php";

function login($util, $mdp)
{
    session_start();

    try {
        $result = getLeUtilisateurByMailU($util);

        if ($result) {
            echo "Utilisateur trouvé : " . $result->mailU . "<br>";
            if (password_verify($mdp, $result->mdpU)) {
                $_SESSION['username'] = $result->pseudoU;
                $_SESSION['mail']     = $result->mailU;
                $_SESSION["mdpU"]     = $result->mdpU;

                header("Location: ./?action=confirmation");
                exit;
            } else {
                echo "<script>alert('Mot de passe incorrect.');</script>";
            echo "<script>window.location.href = './?action=connexion';</script>";
            exit;
            }
        } else {
            
            echo "<script>alert('Utilisateur non trouvé.');</script>";
            echo "<script>window.location.href = './?action=connexion';</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ./?action=accueil");
    exit;
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mail"];
    }
    else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getLeUtilisateurByMailU($_SESSION["mail"]);
        if ($util->mailU == $_SESSION["mail"] && $util->mdpU == $_SESSION["mdpU"]) {
            $ret = true;
        }
    }
    return $ret;
}
?>
