<?php session_start();
include_once 'function/function.php';
include_once 'function/connexion.class.php';
$bdd = bdd();
if(isset($_POST['pseudo']) AND isset($_POST['mdp'])){

    $connexion = new connexion($_POST['pseudo'],$_POST['mdp']);
    $verif = $connexion->verif();
    if($verif =="ok"){
      if($connexion->session()){
          header('Location: index.php');
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
      <img src="https://image.noelshack.com/fichiers/2018/07/1/1518449265-logo.png" class="logo">
        <?php if (isset($_SESSION['admin']) &&  $_SESSION['admin'] == 1 ) { ?>
            <a href="admin.php">ADMINISTRATEUR</a>
        <?php } ?>
      <ul>
        <li><a href="#" class="link">About</a></li>
        <li><a href="#" class="link">Mes recettes</a></li>
        <li><a href="inscription.php" class="link">S'inscrire</a></li>
      </ul>
    </div>


    <!-- fin de nav barre -->


    <div class="videHome">
      <div class="fond"></div>
    </div>

    <div class="connexionContainer">
      <div class="connexionCenter">
      <img src="https://image.noelshack.com/fichiers/2018/07/2/1518531537-man-user-1.png" class="iconRegister">
        <form method="post" action="connexion.php">
            <p>
                <input name="pseudo" type="text" placeholder="Pseudo..." size="18" required /><br><br>
                <input name="mdp" type="password" placeholder="Mot de passe..." size="18" required /><br><br>
                <input type="submit" value="Connexion !" /> <br>
                <?php
                if(isset($erreur)){
                    echo $erreur;
                }
                ?>
            </p>
        </form>
    </div>
  </div>


    <div class="titleArticle">Les recettes à la une</div>

    <!-- Articles en Grid css -->
    <br>
    <div class="wrapper">
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <div class="one"><img src='<?=("img/".$row['img'])?>'>
                <div class="articleTitle"><?=$row['nom']?></div>
                <a href="pageArticle.php">
                    <div class="buttonArticle">Voir plus</div>
                </a>
            </div>
        <?php endwhile;?>
    <!-- footer -->




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
          <div class="textFooter">NetFood.org Chef@Netfood.fr
            <br><br> 01.02.03.04.05
            <br><br> Tous droits réservés NetFood.org - 2017-2018</div>

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
          <div class="textFooter">NetFood est un site où les cuisiniers du dimanches et autres passionnés de cuisines peuvent se retrouver pour s'échanger des recettes.
          </div>
        </div>
      </ul>
    </div>



  </body>

  </html>
