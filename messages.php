<?php

    // Si un message est dans le tableau session, on l'affiche en vert
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        // Une fois affiché, on le supprime :
        unset($_SESSION['message']);
    }
    // Idem en rouge pour une erreur
    if(isset($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo $_SESSION['erreur'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['erreur']);
    }

?>