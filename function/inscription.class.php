<?php  session_start();
include_once 'function.php';


class inscription{

   private $pseudo;
   private $email;
   private $mdp;
   private $mdp2;
   private $bdd;

    public function __construct($pseudo,$email,$mdp,$mdp2){


        $pseudo = htmlspecialchars($pseudo);
        $email = htmlspecialchars($email);

        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->mdp2 = $mdp2;
        $this->bdd = bdd();


    }

    public function verif(){

        if(strlen($this->pseudo) > 5 AND strlen($this->pseudo) < 20 ){ // Verification du pseudo

           $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
           if(preg_match($syntaxe,$this->email)){ // L'email est correct

               if(strlen($this->mdp) > 5 AND strlen($this->mdp) < 20 ){ //Si le mot de passe respecte la norme imposé

                   if($this->mdp == $this->mdp2){ //Verification que les mot de passes sont identiques
                       return 'ok';
                   }

                   else { // Les mots de passe sont différents
                       $erreur = 'Les mots de passe doivent être identique';
                       return $erreur;
                   }
               }

               else { // Le mot de passe ne respecte pas la norme imposé
                   $erreur = 'Le mot de passe doit contenir entre 5 et 20 caractères';
                   return $erreur;
               }
           }


           else {  // L'email ne respecte pas la norme #^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#
               $erreur = 'Syntaxe de l\'adresse email incorrect ';
               return $erreur;
           }
        }
        else { // Le Pseudo ne respecte pas la norme imposé
            $erreur = 'Le pseudu doit contenir entre 5 et 20 caractères';
            return $erreur;
        }

    }


    public function enregistrement(){

        $requete = $this->bdd->prepare('INSERT INTO clients(pseudo,email,mdp,admin) VALUES(:pseudo,:email,:mdp,0)');
        $requete->execute(array(
            'pseudo'=>  $this->pseudo,
            'email' => $this->email,
            'mdp' => openssl_encrypt(($this->mdp),"AES-128-ECB","oui")
        ));

        return 1;

    }

    public function session(){
        $requete = $this->bdd->prepare('SELECT id FROM clients WHERE pseudo = :pseudo ');
        $requete->execute(array('pseudo'=>  $this->pseudo));
        $requete = $requete->fetch();
        $_SESSION['id'] = $requete['id'];
        $_SESSION['pseudo'] = $this->pseudo;

        return 1;
    }



}
