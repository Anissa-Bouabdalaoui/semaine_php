<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

if (!isset($_GET['id'])) {
    exit;
}

$requete = "SELECT 
  `id`, 
  `pseudo`, 
  `comment` 
FROM 
  `comments`
WHERE
  `id` = :id
;";

$stmt = $bdd->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styleArticles.css" />
    <link rel="stylesheet" href="reset.css" />
    <title>hehe</title>
</head>

<body>
<div class="navBarre">
    <img src="https://image.noelshack.com/fichiers/2018/07/1/1518449265-logo.png" class="logo">
    <?php if (isset($_SESSION['admin']) &&  $_SESSION['admin'] == 1 ) { ?>
        <a href="admin.php">ADMINISTRATEUR</a>
    <?php } ?>
    <ul>
        <li><a href="#" class="link">About</a></li>
        <li><a href="#" class="link">Mes recettes</a></li>
        <li class="nameUser"><?php
            echo $_SESSION['pseudo'];
            ?>
            <img src="https://image.noelshack.com/fichiers/2018/07/2/1518531470-man-user.png" class="iconNavBarre"></li>
        <li><button class="deconnexion"><a href="deconnexion.php">Deconnexion</a></button></li>
        <li><img src="https://image.noelshack.com/fichiers/2018/07/1/1518450534-question-mark.png" class="iconNavBarre"></li>
    </ul>
</div>

<form style="padding:300px;" action="doedit.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label for="comment">comment</label> <input type="text" name="comment" value="<?=$row['comment']?>"><br>
    <input type="submit" value="editer">
</form>

</body>
    </html>
    <?php
}
?>