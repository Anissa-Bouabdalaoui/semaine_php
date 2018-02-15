<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

if (!isset($_POST['id']) || !isset($_POST['comment'])) {
    exit;
}

$requete = "UPDATE 
  `comments` 
SET  
  `comment` = :comment 
WHERE 
id = :id
;";
$stmt = $bdd->prepare($requete);
$stmt->bindValue(':comment', $_POST['comment']);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: pageArticle.php');
    
}
?>