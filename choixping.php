<?php
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    echo "Echec : " . $mysqli->connect_errno . " (" . $mysqli->connect_error . ")";
} else {
    session_start(); // Démarrez la session si ce n'est pas déjà fait

    if (isset( $_SESSION['id_utilisateur'])) {
        if ($stmt = $mysqli->prepare("UPDATE etudiant_dominante SET id_ping = ? WHERE id_utilisateur = ?")) {
            $stmt->bind_param("ii", $_SESSION['id_page_ping'], $_SESSION['id_utilisateur']); // "i" indique que c'est un entier (integer)

            if ($stmt->execute()) {
                $stmt->close();
                $mysqli->close();
                $_SESSION['ping_success'] = "ping parfaitement enregistrer";
                header('Location: aa.php');
                
            } else {
                $_SESSION['ping_erreur'] = "Impossible d'enregistrer";
                header('Location: aa.php');
            }
        }
    } else {
        $_SESSION['connectez_vous'] = "connectez vous";
        header('Location: login.php');
    }
}
?>
