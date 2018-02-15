<?php include_once 'function.php';

class connexion{

    private $pseudo;
    private $mdp;
    private $bdd;

    public function __construct($pseudo,$mdp) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->bdd = bdd();
    }

    public function verif(){

        $requete = $this->bdd->prepare('SELECT * FROM clients WHERE pseudo = :pseudo');
        $requete->execute(array('pseudo'=> $this->pseudo));
        $reponse = $requete->fetch();
        if($reponse){

            if(openssl_encrypt(($this->mdp),"AES-128-ECB","oui") == $reponse['mdp']){
                return 'ok';
            }
            else {
                $erreur = 'Le mot de passe est incorrect';
                return $erreur;
            }


        }
        else {
            $erreur = 'Ce compte n\'existe pas';
            return $erreur;
         }


    }

    public function session(){
        $requete = $this->bdd->prepare('SELECT `id`,`admin` FROM clients WHERE pseudo = :pseudo ');
        $requete->execute(array('pseudo'=>  $this->pseudo));
        $requete = $requete->fetch();
        $_SESSION['id'] = $requete['id'];
        $_SESSION['pseudo'] = $this->pseudo;
        $_SESSION['admin'] = $requete['admin'];
        if ( $_SESSION['admin'] == 1) {
            $_SESSION['token'] = rand(10,100);
        }

        return 1;
    }


}
