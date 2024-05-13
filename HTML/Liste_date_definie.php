<?php
session_start();
$email=$_SESSION['email'];
$date=$_POST['date'];
require_once('../PHP/Connexion/connect.php');
if(isset($_POST['delete'])){
  $id=$_POST['id'];
  $req="DELETE FROM depenses WHERE id='$id'";
  $delete=mysqli_query($connexion,$req);
     }
$dépens_day="select * from depenses where Email='$email' and Date='$date';";
$r_dépens_day=mysqli_query($connexion,$dépens_day);

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
  <title>Liste</title>
</head>
<body class="container-fluid">
<thead class="">
  <div class="nav-container shadow-sm">
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container-fluid px-0">
        <div class="ms-4 mt-1"><a href="#"><img class="navbar-brand logo" src="../CSS/img/logo.png" alt="BEZTAM"></a></div>
        <div>
          <ul class="nav justify-content-end me-2">
          <li class="nav-item"><a class="nav-link fw-bold px-5" href="Home_page.html">Home</a></li>
            <li class="nav-item btn-retour"><a class="nav-link fw-bold px-5 " href="Liste_date_definie.html">Retour</a></li>
            <li class="nav-item btn-desab"><a class="nav-link fw-bold px-4 " href="compte.html">Mon compte</a></li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</thead>
<tbody class=" ">
  <div class="container">
     <div class="row text-center mt-5">
      <h2 class="fw-bold ">Liste des dépenses : <?php echo $_POST["date"]?></h2>
     </div>
      <div class="row row-cols-1 row-cols-md- mt-4 pt-3 mx-md-1 px-md-1 mx-sm-1 px-sm-1 justify-content-center text-center">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr><th>ID</th><th>Motif</th><th>Catégorie</th><th>Quantite</th><th>Prix Unitaire</th><th>Prix totale</th><th>Date</th><th>Note</th><th></th></tr>
          </thead>
          <tbody>
              <tr>
             <?php while($line=mysqli_fetch_assoc($r_dépens_day)){ ?>
            <td> <?php echo $line["id"] ?></td>
            <td> <?php echo $line["Motif"] ?></td>
            <td> <?php echo $line["Catégorie"] ?></td>
            <td> <?php echo $line["Quantite"] ?></td>
            <td> <?php echo $line["Prix"] ?> DH</td>
            <td> <?php echo $line["Prix"]*$line["Quantite"] ?> DH</td>
            <td> <?php echo $line["Date"] ?></td>
            <td> <?php echo $line["note"] ?></td>
            <td> 
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $line['id']?>">
          <button name='delete' type="submit" class="btn btn-danger">Supprimer</button>
          </form>
            </td>
              </tr>
              <?php
            }  

           
            ?>
           </tbody>
          </table>
        </div>
      </div>
  
  </div>
  <footer class="container-fluid">
    <div class="col mx-auto" style="color: #002D4C;">Faculté des Sciences et Techniques Béni Mellal 2023 </div>
  </footer>
</tbody>
</body> 
</html>