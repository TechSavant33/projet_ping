<?php
session_start();

$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$mdp1 = htmlentities($_POST['mdp1']);

$statut = htmlentities($_POST['statut']);

$options = [
    'cost' => 12,
];

// Connexion à la BD
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);

// Vérification de la connexion à la base de données
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}

//inscription d'un étudiant
if($statut == "eleve"){
    $dominante = htmlentities($_POST['dominante']);
if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom, prenom, email, password,role) VALUES (?, ?, ?, ?,?)")) {
    $password_crypt = password_hash($mdp1, PASSWORD_BCRYPT, $options);
    $role=2;
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $password_crypt,$role);
    // Le message est mis dans la session pour informer
    if ($stmt->execute()) {
         //je recpère la valeur saisie 
     $nouvel_id = $mysqli->insert_id;
     $stmt->close();

     //j'insère dans la base de donnée des etudiant la dominante
     if ( $stmt = $mysqli->prepare("INSERT INTO etudiant_dominante(id_utilisateur, dominante) VALUES (?, ?)")) {
        // Le message est mis dans la session pour informer
        $stmt->bind_param("is", $nouvel_id,$dominante);
        if (!$stmt->execute()) {
           $_SESSION['erreur'] = "Impossible d'enregistrer";
           header('Loation:inscription.php');
        } 
    }
         
        header('Location: login.php');

    } else {
        $_SESSION['erreur'] = "Impossible d'enregistrer";
        header('Loation:inscription.php');
    }

    // Fermer la préparation de la requête
    $stmt->close();
    $mysqli->close();
}
//inscription d'un membre de la commission ping
}else{
    if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom, prenom, email, password,role) VALUES (?, ?, ?, ?,?)")) {
        $password_crypt = password_hash($mdp1, PASSWORD_BCRYPT, $options);
        if($statut == "commission"){
             //si c'est un membre de la commission
            $role=3;
           
        }else{
            //si c'est un visiteur
            $role=1;
        }
        $stmt->bind_param("ssssi", $nom, $prenom, $email, $password_crypt,$role);
        // Le message est mis dans la session pour informer
        if ($stmt->execute()) {
            header('Location: login.php');
        } else {
            $_SESSION['erreur'] = "Impossible d'enregistrer";
            header("Location:inscription.php");
        }
    
        // Fermer la préparation de la requête
        $stmt->close();
        // Fermer la connexion à la base de données
$mysqli->close();
    }
   
}



?>