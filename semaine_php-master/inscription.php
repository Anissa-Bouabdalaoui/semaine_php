
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
      <li><img src="https://image.noelshack.com/fichiers/2018/07/1/1518450534-question-mark.png" class="iconNavBarre"></li>
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
      </form>
    </div>
  </div>


  <div class="titleArticle">Les recettes à la une</div>
s
  <!-- Articles en Grid css -->
  <br>
  <div class="wrapper">

    <div class="one"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518465610-food1.png" class="imgArticles">
      <div class="articleTitle">Gâteaux à la fraise</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Amandine F.</div>
    </div>


    <div class="two"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518465610-food4.jpg" class="imgArticles">
      <div class="articleTitle">Sandwich à l'avocat</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Pierre B.</div>
    </div>


    <div class="three"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518467919-food2.jpg" class="imgArticles">
      <div class="articleTitle">Hamburger Cheddar</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Rayane M.</div>
    </div>


    <div class="four"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518467919-food5.jpg" class="imgArticles">
      <div class="articleTitle">Avocat assaisonné</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Dimitri B.</div>
    </div>


    <div class="five"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518468344-food3.jpg" class="imgArticles">
      <div class="articleTitle">Salade César</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Dorian D.</div>
    </div>


    <div class="six"><img src="https://image.noelshack.com/fichiers/2018/07/1/1518468278-food6.jpg" class="imgArticles">
      <div class="articleTitle">Pancake fourré au nutella</div>
      <a href="">
        <div class="buttonArticle">Voir la recette</div>
      </a>
      <div class="nameAutorArticle">Julien L.</div>
    </div>
  </div>
  <br><br>

  <div class="more" href="#">Tout voir →</div>
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
