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

$requete = "SELECT 
  `id`, 
  `pseudo`, 
  `comment` 
FROM 
  `comments`
;";
$stmt = $bdd->prepare($requete);
$stmt->execute();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="styleArticles.css" />
  <title>hehe</title>
</head>

<body>
  <div class="navBarre">
      <a href="index.php"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518449265-logo.png" class="logo"></a>
      <?php if ( $_SESSION['admin'] == 1 ) { ?>
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

  <div class="backgroundCommentaire">

  <span class="espaceCommentaire">CE QUE VOUS PENSEZ DE CETTE RECETTE
    </span>
      <div class="lineCommentaire"></div>


      <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
          <div class="containComments">
              <div class="buttonContainer">
                  <?php if ($row['pseudo'] ==  $_SESSION['pseudo'] || $_SESSION['admin'] == 1 ) {?>
              <a class="editButton" href="edit.php?id=<?=$row['id']?>">edit</a>
              <a class="suppButton" href="delete.php?id=<?=$row['id']?>">x</a>
                  <?php } ?>
              </div>
              <p>
                 <?=$row['comment'] ?>
              </p>
              <span style="nameAutor"><?=$row['pseudo'] ?></span><br>
          </div>
  <?php endwhile;?>



<div class="containComments">
    <div class="buttonContainer">
    <button class="editButton">edit</button>
    <button class="suppButton">x</button>
    </div>
  <p>
  Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum.
  </p>
      <span style="nameAutor">Rayane</span><br>
</div>

      <br><br>


<div class="addComment">
    <a href="addcomment.php"  >
  <div class="myCommentFont">AJOUTER UN COMMENTAIRE</div>
    <img src="https://image.noelshack.com/fichiers/2018/07/2/1518530826-forward-arrow.png"  class="postButton">
 </a>
 </div>

</div>


<!--footer-->

<div class="footer">
 <ul class="flex-container">

  <div class="flex-item">
    <div class="titleFooter">suis-nous!</div>
    <div class="line"></div>
    <div class="iconContainer">
      <img src="https://image.noelshack.com/fichiers/2018/07/1/1518472725-facebook-logo-button.png" class="iconSocialNetwork">
      <img src="https://image.noelshack.com/fichiers/2018/07/1/1518472725-instagram-logo.png" class="iconSocialNetwork">
      <img src="https://image.noelshack.com/fichiers/2018/07/1/1518472725-pinterest-logotype-circle.png" class="iconSocialNetwork">
      <img src="https://image.noelshack.com/fichiers/2018/07/1/1518472725-twitter-logo-button.png" class="iconSocialNetwork">
     </div>

    <div class="textFooter">N'hésitez pas à nous follow sur les réseaux sociaux afin de ne rater aucune recette ! </div>
  </div>

  <div class="flex-item">
    <div class="titleFooter">Contact</div>
    <div class="line"></div>
      <div class="textFooter">NetFood.org
        Chef@Netfood.fr
        <br><br>
        01.02.03.04.05
        <br><br>
        Tous droits réservés NetFood.org - 2017-2018</div>

    </div>

  <div class="flex-item">
    <div class="titleFooter">Faq</div>
    <div class="line"></div>
    <br>
    <div class="titleFooter">Mon compte</div>
    <div class="line"></div>
    <br>
    <div class="titleFooter">Netfood.org</div>
    <div class="line"></div>
    <div class="textFooter">NetFood est un site où les cuisiniers du dimanche et autres passionnés de cuisine peuvent apprendre les recettes de nos pros.
    </div>
  </div>
 </ul>
</div>



</body>


</html>
    <?php
}
?>