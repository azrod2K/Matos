<?php
class prets{
    private $idPret;
    private $dateReservation;
    private $dateDebut;
    private $dateFin;
    private $idUtilisateur;
    private $idMateriel;
    private $validation;
    

    /**
     * Get the value of idPret
     */ 
    public function getIdPret()
    {
        return $this->idPret;
    }

    /**
     * Set the value of idPret
     *
     * @return  self
     */ 
    public function setIdPret($idPret)
    {
        $this->idPret = $idPret;

        return $this;
    }

    /**
     * Get the value of dateReservation
     */ 
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set the value of dateReservation
     *
     * @return  self
     */ 
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

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
     * Get the value of idMateriel
     */ 
    public function getIdMateriel()
    {
        return $this->idMateriel;
    }

    /**
     * Set the value of idMateriel
     *
     * @return  self
     */ 
    public function setIdMateriel($idMateriel)
    {
        $this->idMateriel = $idMateriel;

        return $this;
    }

    /**
     * Get the value of validation
     */ 
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set the value of validation
     *
     * @return  self
     */ 
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }
}
?>