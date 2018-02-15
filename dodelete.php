<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


// Accès a la page
if(!isset($_SESSION['id'])){
    header('Location: inscription.php');
}
else {

    if (!isset($_POST['id'])) {
        exit;
    }
    $requete = "DELETE FROM 
    `comments` 
    WHERE 
    id = :id;";
    $stmt = $bdd->prepare($requete);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('Location: pageArticle.php');

}
?>