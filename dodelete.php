<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


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

    if (!isset($_POST['id'])) {
        exit;
    }
    require_once "function/function.php";
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