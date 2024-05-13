<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <link rel="stylesheet" href="../../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <title>Enregistrement</title>
</head>
<body>
<?php
        require_once('../../Connexion/connect.php');
         $email=$_SESSION["email"];
        $date = $_POST['date'];
        //supprimer les dépenses d'un jour
            $dell_day="delete from depenses where Email='$email' and Date='$date' ;" ;
            $r_dell_day=mysqli_query($connexion,$dell_day);
            if($r_dell_day){
                ?>
                <div class="alert alert-success" role="alert">
                Vos dépenses ont été supprimées avec succès<a href="../../../HTML/Home_page.html" class="alert-link fw-bold"> Home </a>
               </div>
                <?php
                die("");
            }
        ?>

</body>
</html>