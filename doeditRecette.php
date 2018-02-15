<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
}
else {

    if (!isset($_POST['id']) || !isset($_POST['img']) || !isset($_POST['nom'])) {
        exit;
    }

    $requete = "UPDATE 
  `recettes` 
SET  
  `img` = :img,
  `nom` = :nom 
WHERE 
id = :id
;";
    $stmt = $bdd->prepare($requete);
    $stmt->bindValue(':img', $_POST['img']);
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('Location: adminRecette.php');

}
?>