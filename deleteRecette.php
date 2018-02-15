<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
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

    $requete = "SELECT 
  `id`, 
  `img`, 
  `nom`
FROM 
  `recettes`
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
        <a href="addRecette.php">Ajouter</a>
        <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td>id</td>
                <td>img</td>
                <td>nom</td>
                <td>editer</td>
                <td>supprimer</td>
            </tr>
            <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><img style="height=100px;width:100px;" src='<?=("img/".$row['img'])?>'></td>
                    <td><?=$row['nom']?></td>
                    <td><a href="editRecette.php?id=<?=$row['id']?>">editer</a></td>
                    <td><a href="dellRecette.php?id=<?=$row['id']?>">X</a></td>
                </tr>
            <?php endwhile;?>
        </table>
    </div>

    </body>

    </html>

    <?php
}
?>
