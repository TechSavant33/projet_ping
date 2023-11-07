<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu déroulant Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img id="logo1" src="assets/img/esigelec.png" alt="Logo Esigelec"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="aa.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">À propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <?php
            if (isset( $_SESSION['id_utilisateur'])){
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="monPing.php">MonPing</a>';
                echo '</li>';
                echo ' <li class="nav-item">';
                echo '   <a class="nav-link" href="traitementDeconnexion.php">Deconnexion</a>';
                echo '  </li>';
            }else{
                echo '  <li class="nav-item">';
                echo '  <a class="nav-link" href="login.php">Connexion</a>';
                echo ' </li>';
                echo '  <li class="nav-item">';
                echo ' <a class="nav-link" href="inscription.php">Inscription</a>';
                echo ' </li>';
            }
            ?>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
