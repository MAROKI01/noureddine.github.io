<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>Tout supprimer</title>
</head>
<body>
<?php
           $email=$_SESSION["email"];
            //supprimer toutes ses dépenses
            require_once('../../Connexion/connect.php');
            $del_all="delete  from depenses where Email='$email';";
            $r_dell_all=mysqli_query($connexion,$del_all);
            if($r_dell_all) 
            { ?>
            <div class="alert alert-success" role="alert">
            Toutes vos dépenses ont été supprimées avec succès !<a href="../../../HTML/Home_page.html" class="alert-link">Home</a>
            </div>
            <?php
            die(" ");
            }
        ?>


</body>
</html>