<?php
session_start();
include 'messages.php';
?>
 <!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="traitementInscription.php" method="POST">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="mb-3">
                    <input class="form-control" type="text" id="nom" name="nom" required placeholder="Nom">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" id="prenom" name="prenom" required placeholder="Prénom">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" id="email" name="email" required placeholder="Email">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" id="mdp1" name="mdp1" required placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" id="mdp2" name="mdp2" required placeholder="Password (repeat)">
                </div>
                <div class="mb-3">
                    <label for="statut">Sélectionner votre Statut:</label>
                    <select id="statut" name="statut" onchange="afficherInput()">
                        <option value="---Sélectionner votre statut---">---Sélectionner votre statut---</option>
                        <option value ="visiteur">Visiteur</option>
                        <option value="eleve">Eleve</option>
                        <option value="commission">Membre de la commission</option>
                    </select>
                </div>
                <div class="mb-3" id="dom">
                    <input class="form-control" type="text" id="dominante" name="dominante"  placeholder="Votre dominante">
                </div>
                <script>
        function afficherInput() {
            var select = document.getElementById("statut");
            var saisieInput = document.getElementById("dominante");

            if (select.value === "eleve") {
                saisieInput.style.display = "block";
            } else {
                saisieInput.style.display = "none";
            }
        }
    </script>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">I agree to the license terms.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100" type="submit">Sign Up</button>
                </div>
                <a class="already" href="login.php">You already have an account? Login here.</a>
            </form>
        </div>
    </section>
    
   
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
