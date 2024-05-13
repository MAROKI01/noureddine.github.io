<?php
session_start();
list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
$_SESSION["date"] = $year . '-' . $month . '-' . $day ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
        //Vérifier et valider la souscription d'une personne
        require_once('../connect.php');
        // verification des donnees
        $nom=$_POST["nom"];$prénom=$_POST["prenom"];$email=$_POST["mail"];$Mopass=$_POST["md"];$Cmpass=$_POST["cmd"];
        $patternmp="/.{4,8}/";

        if(!preg_match($patternmp,$Mopass))
        { ?>
        <div class="alert alert-danger" role="alert">
        Votre mot de passe ne respecte pas la convention ! <a href="#" class="alert-link">Services</a>
      </div>
      <?php
      die(" ");
        }
        $patternmail="/[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.[a-zA-Z]{2,4}/";
        if(!preg_match($patternmail,$email))
        { ?>
        <div class="alert alert-danger" role="alert">
        Votre email ne respecte pas la convention ! <a href="#" class="alert-link">Services</a>
      </div>
      <?php
      die(" ");
        }
       
        if($Mopass!=$Cmpass)
        { ?>
        <div class="alert alert-danger" role="alert">
        Désolé, mots de passe non concordants ! <a href="#" class="alert-link">Services</a>
      </div>
      <?php
      die(" ");
        }
        $deja_inscrit="select Email from souscripteurs where Email='$email'";
        $verify=mysqli_query($connexion,$deja_inscrit);
        $count =mysqli_num_rows($verify);
        if($count>0)
        { ?>
        <div class="alert alert-primary" role="alert">
        Tu est deja inscrit !! <a href="../../../HTML/connexion.html" class="alert-link">Se connecter</a>
        </div>
      <?php
      die("");
        }
        $insert_sous_req="insert into souscripteurs values('$nom','$prénom','$email','$Mopass');";
        $insert_sous=mysqli_query($connexion,$insert_sous_req);
        if(!$insert_sous)
        { ?>
        <div class="alert alert-Danger" role="alert">
        Votre inscription n'a pas réussi ,veuillez réessayer ultérieurement ! <a href="#" class="alert-link">Services</a>
      </div>
      <?php
        die(" ");
        }
        ?>
        <div class="alert alert-success" role="alert">
        Inscription validée ! <a href="../../../HTML/Home_page.html" class="alert-link">Services</a>
       </div>
       <?php
       $_SESSION['email']=$email;
       die(" ");
       ?>
</body>
</html>