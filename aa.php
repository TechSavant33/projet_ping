
<?php
session_start();
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        // Une fois affiché, on le supprime :
        unset($_SESSION['message']);
    }
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
<main>
    <section>
        <div class="container">
            <h1 id="sujet">Sujet en tendance </h1> <!-- Supprimez les styles inutiles sur cet élément -->
        </div>
    </section><br>
    <!-- Partie PHP -->
    <?php  
    require_once('param.inc.php');
    $mysqli = new mysqli($host, $login, $passwd, $dbname);
    if ($mysqli->connect_error) {
        echo "Echec : " . $mysqli->connect_errno . " (" . $mysqli->connect_error . ")";
    } else {
        $mysqli->set_charset("utf8");
        $requete = "SELECT SUBSTR(description, 1, 100) AS description, id_ping,nom_ping,lien_image FROM ping;";
        $resultat = $mysqli->query($requete);
        $mysqli->set_charset("utf8");

        if (!$resultat) {
            // Erreur de requête
            die("Échec ! de la requête :" . $mysqli->error);
        } elseif ($resultat->num_rows == 0) {
            echo "<p> Aucun résultat </p>";
        } else {
            echo '<div class="container">';
            echo '<div class="row">';
            while ($tuple = $resultat->fetch_assoc()) {
                echo '<div class="col-md-4">';
                //18.85 pour le rem
                echo '<div class="card h-100" style="width: 18.85rem;">';
                echo '<img src="' . $tuple['lien_image'] . '" class="card-img-top resized-image" alt="' . $tuple['nom_ping'] . '" style="width: 17,5rem; height: 11rem;">';
                echo '<div class="card-body" >';
                echo '<h5 class="card-title">' . $tuple['nom_ping'] . '</h5>';
                //pour afficher les 100 premiers caractères de la descriptio,
                echo '<p class="card-text">' . $tuple['description'] . '...</p>';
                echo '<a href="#" class="btn btn-primary" style="width: 15rem" onclick="window.location.href = \'page_sujet.php?id='.$tuple['id_ping'].'\'">Cliquer-ici</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</br>';
        }
    }
    ?>
    <section>
        <div class="container">
            <h1 id="temoignages" style="height: 41px; width: 930px; margin: 2px; padding: 0px;">Témoignages</h1></br>
        </div>
    </section>
    <div class="container">
        <p><b><p>Silly Coulibaly:</p></b> La malnutrition sous toutes ses formes comprend la dénutrition (émaciation, retard de croissance, insuffisance pondérale), les carences en vitamines ou en minéraux, le surpoids, l’obésité et les maladies non transmissibles liées à l’alimentation. Ce projet PING m'a permis de prendre conscience de l'inégalité présente dans ce monde. Parmi les enfants âgés de moins de 5 ans, 52 millions souffrent d’émaciation, 17 millions souffrent d’émaciation sévère et 155 millions présentent un retard de croissance, alors que 41 millions sont en surpoids ou obèses. La dénutrition joue un rôle dans environ 45 % des décès d’enfants âgés de moins de 5 ans. Ces décès interviennent principalement dans les pays à revenu faible ou intermédiaire. Dans le même temps, dans ces mêmes pays, les taux d’enfants en surpoids ou obèses sont en hausse. Les conséquences économiques, sociales, médicales et sur le développement de la charge mondiale de la malnutrition sont graves et persistantes aussi bien pour les individus et leurs familles que pour les communautés et pour les pays."</p>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
