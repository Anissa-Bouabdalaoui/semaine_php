<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

$bdd = $bdd = new PDO('mysql:host=localhost;dbname=SneakersOmerta', 'root', '', $pdo_options);
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

if (!isset($_POST['img']) || !isset($_POST['nom']) ) {
    exit;
}
require_once "function/function.php";
$requete = "INSERT INTO 
`recettes` 
(`img`,`nom`) 
VALUES 
(:img,:nom)
;";



$stmt = $bdd->prepare($requete);
$stmt->bindValue(':img', $_POST['img']);
$stmt->bindValue(':nom', $_POST['nom']);
$stmt->execute();
}
header('Location: adminRecette.php');
?>