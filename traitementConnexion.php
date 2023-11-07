<?php
session_start();

$email = htmlentities($_POST['email']);
$mdp = htmlentities($_POST['password']);
require_once("param.inc.php"); // La fonction require_once est corrigée ici

// Connexion à la base de données
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Lorsqu'un étudiant se connecte

    // Assurez-vous d'utiliser des guillemets simples autour de $email et $mdp dans la requête SQL
    $requete = "SELECT * FROM utilisateur WHERE email = '$email'";
    $resultat = $mysqli->query($requete);

    if (!$resultat) {
        // Erreur de requête
        die("Échec !");
    } elseif ($resultat->num_rows == 0) {
        // Pas d'email existant
        $_SESSION['erreur'] = 'Erreur de connexion';
         header('Location: login.php');
    } else {
        $tuple = $resultat->fetch_assoc();
        // Vérification du mot de passe
        if (password_verify($mdp, $tuple['password'])) {
            // Si le mot de passe est correct
            $_SESSION['message'] = "Connexion réussie";
            $_SESSION['login'] = $tuple["prenom"];
            $_SESSION['email']=$tuple['email'];
            $_SESSION['role'] = $tuple['role'];
            $_SESSION['id_utilisateur']=$tuple['id_utilisateur'];
            header('Location: aa.php');
            exit; 
        } else{
            //mot de passe incorrect
            header('Location: login.php');
       $_SESSION['erreur']='mot de passe incorrect';
       }
    }



?>
