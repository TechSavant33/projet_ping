<?php
include "menu.php";
require_once ('param.inc.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_page_ping']=$_GET['id'];
    

    $mysqli = new mysqli($host, $login, $passwd, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
    $requete = "SELECT * from ping where id_ping=$id;";
    $resultat = $mysqli->query($requete);
   
  
  
  
  $donnee = $resultat->fetch_assoc();

  echo '<div class="container">';
  echo '<div class="row">';
  // creer une ligne et fait en sorte que la ligne est une seule colonne sur les écrans de petite taille et 12 colonnes sur ceux de grande taille
  echo '<div class="row row-cols-1 row-cols-md-12 ">'; 
  echo '<img src="' . $donnee['lien_image'] . '" alt="' . $donnee['nom_ping'] . '">';
  echo '</div>';
  echo '</div>';
  echo '<div class="row">';
  echo '<div class="col-lg-12 col-md-6">'; 
  echo '<br>';
  echo '<h1>DESCRIPTION DU PING</h1>';
  echo '<br>';
  echo $donnee['description'];
  echo '</div>';
  echo '</div>';
  echo '<br>';
  echo '<br>';
  echo '<div class="row">';
  echo '<div class="col-lg-12 col-md-12">'; 
  echo'<form action = "choixping.php" method ="POST">';
  echo'<button type="submit" class="btn btn-primary">Inscrivez vous!</button>';
    if (isset($_POST['inscription'])) {

        $nomEleve = $_POST['nomEleve'];
        $emailEleve = $_POST['emailEleve'];

       // $insertQuery = "INSERT INTO demandes (id_utilisateur, id_etudiant_dominante, id_ping)VALUES ($user_id, $dom_id, $id)";
        $insertResult = $mysqli->query($insertQuery);

        if ($insertResult) {

            echo "L'élève a été inscrit avec succès!";
        } else {

            echo "Erreur lors de l'inscription de l'élève : " . $mysqli->error;
        }
    }

    echo'</Form>';
  echo '</div>';
  echo '</div>';
  echo '</div>';

}
?>
