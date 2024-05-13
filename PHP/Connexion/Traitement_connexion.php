<?php
session_start();
require_once('connect.php');
list($day, $month, $year,) = explode("/", date('d/m/Y'));
$_SESSION["date"] = $year . '-' . $month . '-' . $day ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<?php
        // verrifier si la personne est déjà inscrite
        
        $email=$_POST["mail"];$Mp=$_POST["md"];
        $verifyselect= "select Password from souscripteurs where Email='$email';";
        $verify=mysqli_query($connexion,$verifyselect);
        $count =mysqli_num_rows($verify);
        $line=mysqli_fetch_assoc($verify);
        if($count>0)
        { 
          if(strcmp($line['Password'],$Mp)!=0)
        { 
          ?>
        <div class="alert alert-danger" role="alert">
      Mot de passe incorrect !<a href="../../HTML/connexion.html" class="alert-link">Reessayer</a>
      </div>
      <?php
      die('');
        }
          $_SESSION["email"]=$email;
          ?>
        <div class="alert alert-primary" role="alert">
      Connexion réssie, tu peut consulter nos <a href="../../HTML/Home_page.html" class="alert-link"> Services </a>
      </div>
      <?php
        }
        else
        {?>
        <div class="alert alert-danger" role="alert">
      Veuillez vous inscrire d'abord sur la plateforme <a href="../../HTML/Inscription.html" class="alert-link">S'inscrire</a>
      </div>
      <?php
        }
      ?>
</body>
</html>
 

    
