
<?php

session_start();
include_once 'function/function.php';
include_once 'function/inscription.class.php';
$bdd = bdd();

if(isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['mdp'])  AND isset($_POST['mdp2'])){

    $inscription = new inscription($_POST['pseudo'],$_POST['email'],$_POST['mdp'],$_POST['mdp2']);
    $verif = $inscription->verif();
    if($verif == "ok"){ //Tout est vérifié
     if($inscription->enregistrement()){
            if($inscription->session()){ /*Tout est mis en session*/
                header('Location: index.php');
            }
        }
        else{ //Erreur lors de l'enregistrement
            echo 'Une erreur est survenue';
        }
    } else {
       $erreur = $verif;
    }

}
session_start();
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
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="style.css" />
    <title></title>
</head>

<body>
  <div class="navBarre">
    <img src="https://image.noelshack.com/fichiers/2018/07/1/1518449265-logo.png" class="logo">
    <ul>
      <li><a href="#" class="link">About</a></li>
      <li><a href="#" class="link">Mes recettes</a></li>
      <li> <a href="connexion.php"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518450534-iconuser.png" class="iconNavBarre"></a></li>
    </ul>
  </div>


  <!-- fin de nav barre -->


  <div class="videHome">

    <div class="fond">
    </div>
  </div>

  <div class="inscriptionContainer">
    <div class="inscriptionCenter">
      <img src="https://image.noelshack.com/fichiers/2018/07/2/1518531537-man-user-1.png" class="iconRegister">
      <form class="Inscription" method="post" action="inscription.php">
        <div class="pseudo">
          <p>Pseudo</p><input name="pseudo" type="text" placeholder="Pseudo(min. 5 caractères)" required /><br>
        </div>

        <div class="email">
          <p>E-mail</p><input name="email" type="text" placeholder="Adresse email" required /><br>
        </div>

        <div class="mdp">
          <p>Mot de passe</p><input name="mdp" type="password" placeholder="Mot de passe (min. 5 caractères)" required /><br>

        </div>

        <div class="mdp2">
          <p>Confirmation</p><input name="mdp2" type="password" placeholder="Confirmation du mot de passe" required /><br>
        </div>
        <br>

        <div class="inscriptionBouton">
          <input type="submit" value="S'inscrire!" />
        </div>

          <div style="text-decoration: none;padding-top: 5px;">
              <a href="connexion.php"><span style=";font-size:16px;color:white;font-family: 'Roboto';">J'ai déjà un compte</span></a>
          </div>
      </form>
    </div>
  </div>


  <div class="titleArticle">Les recettes à la une</div>
s
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
