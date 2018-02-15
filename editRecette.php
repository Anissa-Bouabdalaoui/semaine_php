<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
}
else {

    if (!isset($_GET['id'])) {
        exit;
    }
    $requete = "SELECT 
  `id`, 
  `img`, 
  `nom`
FROM 
  `recettes`
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
        <form style="padding:300px;" action="doeditRecette.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <label for="img">Nom de l'image</label> <input type="text" name="img" value="<?=$row['img']?>"><br>
            <label for="nom">Nom de la recette</label> <input type="text" name="nom" value="<?=$row['nom']?>"><br>
            <input type="submit" value="editer">
        </form>
    </div>

    </body>

    </html>

    <?php
}
?>
