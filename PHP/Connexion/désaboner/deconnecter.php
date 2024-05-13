<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../CSS/img/logo-title.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$dec=session_destroy();
if($dec)
        { ?>
        <div class="alert alert-success" role="alert">
        Tu est deconnectee !!<a href="../../../HTML/connexion.html" class="alert-link">Connection</a>
        </div>
        <?php
        die(" ");
        }
?>
</body>
</html>