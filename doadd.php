<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

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
header('Location: pageArticle.php');
}

?>