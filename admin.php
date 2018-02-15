<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
}
else {

    ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="reset.css" />
  <title></title>
</head>

<body>
  <div class="navBarre">
      <a href="index.php"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518449265-logo.png" class="logo"></a>
    <ul>
      <li class="nameUser"><?php
               echo $_SESSION['pseudo'];
                ?>
          <img src="https://image.noelshack.com/fichiers/2018/07/2/1518531470-man-user.png" class="iconNavBarre"></li>
          <li><button class="deconnexion"><a href="deconnexion.php">Deconnexion</a></button></li>
      <li><img src="https://image.noelshack.com/fichiers/2018/07/1/1518450534-question-mark.png" class="iconNavBarre"></li>
    </ul>
  </div>


  <!-- fin de nav barre -->
<div style="padding: 300px;">
  <a href="adminRecette.php">Liste des recettes</a>
  <a href="adminAccount.php">Liste des utilisateur</a>
</div>

</body>

</html>

<?php
}
?>
