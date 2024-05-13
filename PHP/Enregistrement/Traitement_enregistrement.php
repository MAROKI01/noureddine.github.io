<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
  <link rel="stylesheet" href="../../../bootstrap-5.0.2-dist/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/style_enregistrement.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/select-o.css' rel='stylesheet'>
    <title>Enrégistrement</title>
</head>
<body>
    
    
<?php
        //Récuperer les données entrées et les insérer dans la table dépense
        require_once('../Connexion/connect.php');
        $email=$_SESSION["email"];$catégorie=$_POST["categorie"];$motif=$_POST["motif"];$prix=$_POST["cout"];$note=$_POST["note"];$qte=$_POST["qte"];
        $date = $_SESSION["date"];
        $ajout_req="insert into Depenses(Email,Motif,Catégorie,Quantite,prix,date,note) values('$email','$motif','$catégorie','$qte','$prix','$date','$note');";
        $insert=mysqli_query($connexion,$ajout_req);
        if(!$insert)
        { ?>
        <div class="alert alert-danger" role="alert">
        Echec les donnees ne sont pas sauvegardees !<a href="#" class="alert-link">Contact</a>
      </div>
      <?php
      die(" ");
        }
        ?>
        <div class="alert alert-success" role="alert">
        Réussie, les donnees sont sauvegardees !<a href="../../HTML/Enregistrer.html" class="alert-link">Retour</a>
        </div>
        <?php
     
         ?>

</body>
</html>