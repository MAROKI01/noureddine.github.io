<?php
session_start();
require_once('../PHP/Connexion/connect.php');
        $email=$_SESSION["email"];
        $date = $_SESSION['date'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
  <link rel="stylesheet" href="../../bootstrap-5.0.2-dist/css/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../CSS/Supprimer.css">
  <title>Résumé</title>
</head>
<body class="container-fluid p-0 m-0 ">
<thead>
  <div class="nav-container shadow-sm p-0 m-0">
    <nav class="navbar navbar-expand-lg p-0 ">
      <div class="container-fluid p-0">
        <div class="ms-4"><a href="#"><img class="navbar-brand logo" src="../CSS/img/logo.png" alt="BEZTAM"></a></div>
        <div>
          <ul class="nav justify-content-end me-2">
          <li class="nav-item"><a class="nav-link fw-bold px-5" href="Home_page.html">Home</a></li>
            <li class="nav-item btn-retour"><a class="nav-link fw-bold px-5 " href="Resumer_home.html">Retour</a></li>
            <li class="nav-item btn-desab"><a class="nav-link fw-bold px-4 " href="compte.html">Mon compte</a></li>          </ul>
        </div>
      </div>
    </nav>
  </div>
</thead>
<tbody class="">
    <div class="container justify-content-center">
      <div class="row text-center mt-5 pb-1"><h2 class="fw-bold">Résume d'aujourd'hui</h2></div>
      <div class="row justify-content-center align-centent-center mt-0 mx-5 pt-0">
      <div class="col">
        <?php
        //moyenne des dépenses d'un jour
        $moy_day="select avg(Prix*Quantite) as moyenne from depenses where Email='$email' and Date='$date';";
        $r_moy_day=mysqli_query($connexion,$moy_day);
        $result=mysqli_fetch_assoc($r_moy_day);
        ?>
        <div class="row m-4 p-2 shadow-sm rounded justify-content-center ">Dépense moyenne : <strong class="text-center fs-5 color"><?php echo number_format($result["moyenne"], 2, ',', ' ');?> DH</strong></div>
        <?php
        $d_min="select min(prix*Quantite) as min from depenses where Email='$email' and Date='$date';";
        $r_d_min=mysqli_query($connexion,$d_min);
        $result=mysqli_fetch_assoc($r_d_min);
        ?>
        <div class="row m-4 p-2 shadow-sm rounded justify-content-center">Dépense minimum : <strong class="text-center fs-5 color"><?php echo number_format($result["min"], 2, ',', ' ');?> DH</strong></div>
        <?php
        $d_max="select max(prix*quantite) as max from depenses where Email='$email' and Date='$date';";
        $r_d_max=mysqli_query($connexion,$d_max);
        $result=mysqli_fetch_assoc($r_d_max);
        ?>
        <div class="row m-4 p-2 shadow-sm rounded justify-content-center">Dépense maximum : <strong class="text-center fs-5 color"><?php echo number_format($result["max"], 2, ',', ' ');?> DH</strong></div>
        <?php
        $som_day="select sum(prix*quantite) as somme from depenses where Email='$email' and Date='$date';";
        $r_som_day=mysqli_query($connexion,$som_day);
        $result=mysqli_fetch_assoc($r_som_day);
        ?>
        <div class="row mb-4 mx-4 p-2 shadow-sm rounded justify-content-center">Somme des dépenses : <strong class="text-center fs-5 color"><?php echo number_format($result["somme"], 2, ',', ' ');?> DH</strong></div>
      </div>
      <div class="col col2 my-4 p-3  shadow-sm rounded justify-content-center">
        Dépenses par catégorie : <br>
        <?php
        //Somme des dépenses par catégorie
        $dépens_par_catég="select Catégorie, sum(prix*quantite) as somme from depenses where Email='$email' and Date='$date' group by Catégorie;";
        $r_dépens_par_catég=mysqli_query($connexion,$dépens_par_catég);
        ?>
        <div class="table-responsive mt-4">
        <table class="table table-hover">
          <thead>
            <tr><th>Catégorie</th><th>Somme</th></tr>
          </thead>
          <tbody>
              <tr>
             <?php while($line=mysqli_fetch_assoc($r_dépens_par_catég)){ ?>
            <td> <strong><?php echo $line["Catégorie"] ?></strong></td>
            <td> <strong><?php echo number_format($line["somme"], 2, ',', ' '); ?> DH</strong></td>
          
              </tr>
              <?php
            }  
            ?>
           </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Footer -->
    </div>
    <footer class="container-fluid">
    <div class="col mx-auto" style="color: #002D4C;">Faculté des Sciences et Techniques Béni Mellal 2023 </div>
  </footer>
</tbody>

</body>
</html>