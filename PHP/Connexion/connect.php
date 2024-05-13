<?php
$connexion=mysqli_connect("localhost","root","Naimf@fatim2015","suiviDeDepense",3307);
if(!$connexion)
{ ?>
<div class="alert alert-danger" role="alert">
Nous rencontrons un problème pour vous connecter à la base, veuillez réesayer ! <a href="#" class="alert-link">Contact</a>
</div>
<?php
die(" ");
}
$selctectBD=mysqli_select_db($connexion,"suiviDeDepense");
if(!$selctectBD)
{ ?>
<div class="alert alert-danger" role="alert">
Table dépense intouvable !<a href="#" class="alert-link">Contact</a>
</div>
<?php
die(" ");
}
?>