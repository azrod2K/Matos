<?php
class materiels{
    private $idMateriel;
    private $marque;
    private $description;
    private $dateEntreeStock;
    private $actif;
    private $categorie;
    private $isDelete;

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
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of dateEntreeStock
     */ 
    public function getDateEntreeStock()
    {
        return $this->dateEntreeStock;
    }

    /**
     * Set the value of dateEntreeStock
     *
     * @return  self
     */ 
    public function setDateEntreeStock($dateEntreeStock)
    {
        $this->dateEntreeStock = $dateEntreeStock;

        return $this;
    }

    /**
     * Get the value of actif
     */ 
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set the value of actif
     *
     * @return  self
     */ 
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of isDelete
     */ 
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * Set the value of isDelete
     *
     * @return  self
     */ 
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;

        return $this;
    }
}
?>