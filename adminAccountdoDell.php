<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
    header('Location: h4ck3rz.php');
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
    if (!isset($_GET['id'])) {
        exit;
    }
    require_once "function/function.php";
    $requete = "DELETE FROM 
`clients` 
WHERE 
id = :id;";

    $stmt = $bdd->prepare($requete);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: adminAccount.php');

}
?>
