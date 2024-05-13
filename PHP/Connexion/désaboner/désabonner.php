<?php
session_start();
require_once('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>Désabonnement</title>
</head>
<body>
   

    <?php
    //supprimer les information concernant la personne

        $email=$_SESSION["email"];
        $désabonner="delete from souscripteurs where Email='$email';";
        $r_désabonner=mysqli_query($connexion,$désabonner);
        if(!$r_désabonner)
        { ?>
        <div class="alert alert-danger" role="alert">
        Erreur de desabonnement !<a href="#" class="alert-link">Contacer le support</a>
        </div>
        <?php
        die(" ");
        }

        $désabonner_d="delete from depenses where Email='$email';";
        $r_désabonner_d=mysqli_query($connexion,$désabonner_d);
        ?>
        <div class="alert alert-success" role="alert">
        Votre compte a ete supprimer, si vous avez rencontrer des problèmes <a href="#" class="alert-link">Contacer le support</a> ou
        <strong><a href="../../../HTML/Inscription.html" class="alert-link">Reinscrire</a></strong>
        </div>

</body>
</html>