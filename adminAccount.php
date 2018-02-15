<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
}
else {


$requete = "SELECT 
  `id`, 
  `pseudo`, 
  `email`,
  `mdp` ,
  `admin`
FROM 
  `clients`
;";
$stmt = $bdd->prepare($requete);
$stmt->execute();

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
      <?php if (isset($_SESSION['admin']) &&  $_SESSION['admin'] == 1 ) { ?>
          <a href="admin.php">ADMINISTRATEUR</a>
      <?php } ?>
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
    <table cellspacing="0" cellpadding="10px" width="100%">
        <tr>
            <td>id</td>
            <td>pseudo</td>
            <td>email</td>
            <td>mdp</td>
            <td>admin</td>
            <td>supprimer</td>
        </tr>
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['pseudo']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['mdp']?></td>
                <td><?=$row['admin']?></td>
                <td><a href="adminAccountdoDell?id=<?=$row['id']?>">X</a></td>
            </tr>
        <?php endwhile;?>
    </table>
</div>

</body>

</html>

<?php
}
?>
