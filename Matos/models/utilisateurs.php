<?php
class utilisateurs{
    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $noTel;
    private $motDePasse;
    private $email;
    private $statut;
    

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of noTel
     */ 
    public function getNoTel()
    {
        return $this->noTel;
    }

    /**
     * Set the value of noTel
     *
     * @return  self
     */ 
    public function setNoTel($noTel)
    {
        $this->noTel = $noTel;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */ 
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */ 
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    //crypter le mot de passe
    public static function Crypter($mdpClair){
        return md5($mdpClair);
    }
    
    // verrifier les informations de connection
    public static function CheckConnected(utilisateurs $user)
    {
        $email = $user->getEMail();
    
        $req = MonPdo::getInstance()->prepare("SELECT email,MotDePasse FROM utilisateur WHERE email = :email;");
        $req->bindParam(":email", $email);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'utilisateurs'); // mettre le nom de la classe
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
}
?>