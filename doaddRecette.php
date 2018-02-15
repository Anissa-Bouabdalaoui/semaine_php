<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

if (!isset($_POST['img']) || !isset($_POST['nom']) ) {
    exit;
}


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