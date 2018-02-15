<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
}
else {

    $requete = "DELETE FROM 
    `recettes` 
    WHERE 
    id = :id;";
    $stmt = $bdd->prepare($requete);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: adminRecette.php');

}
?>
