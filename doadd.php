<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

if(isset($_POST['name']) AND isset($_POST['sujet'])){

    $addPost = new addPost($_POST['name'],$_POST['sujet']);
    $verif = $addPost->verif();
    if($verif == "ok"){
        if($addPost->insert()){

        }
    }
    else {
        $erreur = $verif;
    }

}
?>
<?php

if (!isset($_POST['comment'])) {
    exit;
}
$requete = "INSERT INTO 
`comments` 
(`pseudo`,`comment`) 
VALUES 
(:pseudo,:comment)
;";



$stmt = $bdd->prepare($requete);
$stmt->bindValue(':comment', $_POST['comment']);
$stmt->bindValue(':pseudo', $_SESSION['pseudo']);
$stmt->execute();
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
    <ul>
        <li><a href="#" class="link">About</a></li>
        <li><a href="#" class="link">Mes recettes</a></li>
            <img src="https://image.noelshack.com/fichiers/2018/07/2/1518531470-man-user.png" class="iconNavBarre"></li>
        <li><button class="deconnexion"><a href="deconnexion.php">Deconnexion</a></button></li>
        <li><img src="https://image.noelshack.com/fichiers/2018/07/1/1518450534-question-mark.png" class="iconNavBarre"></li>
    </ul>
</div>

<p style="padding:300px;"> <?= $_POST['comment'] ?> <?php
    echo $_SESSION['pseudo'];
    ?></p>

</body>
</html>
    <?php
}
header('Location: pageArticle.php');
?>