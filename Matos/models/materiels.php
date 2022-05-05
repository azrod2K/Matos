<?php
class materiels
{
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

    //fonction qui permet de selection tout le matériel disponible
    public static function GetAllMateriel(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM materiels WHERE actif == 0");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->execute();
        $returnSQL = $req->fetchAll();

        return $returnSQL;
    }

    //fonction qui permet d'ajouter du matériel
    public static function AddMaterial(materiels $materiels)
    {
        $actif = 0;
        $categorie = $materiels->getCategorie();
        $dateEntreeStock = date("Y-m-d H:i:s");
        $description = $materiels->getDescription();
        $marque = $materiels->getMarque();
        $isDelete = 0;

        $sql = MonPdo::getInstance()->prepare('INSERT INTO materiels(actif, categorie, dateEntreeStock, description, marque, isDelete) VALUES(:Actif, :Categorie, :DateEntreeStock, :Description, :Marque, :IsDelete)');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiel');
        $sql->bindParam(':Actif', $actif);
        $sql->bindParam(':DCategorie', $categorie);
        $sql->bindParam(':DateEntreeStock', $dateEntreeStock);
        $sql->bindParam(':Description', $description);
        $sql->bindParam(':Marque', $marque);
        $sql->bindParam(':IsDelete', $isDelete);
        $sql->execute();
    }

    //fonction qui delete le matériel(en invisible pour les utilisateurs)
    public static function SetDelete($idMateriel, $action)
    {
        $req = MonPdo::getInstance()->prepare('UPDATE materiels SET isDelete = :deleted WHERE idMateriel = :IdMateriel');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->bindParam(':deleted', $action);// 0 = visible / 1 = pas visible
        $req->bindParam(':IdMateriel', $idMateriel);
        $req->execute();
    }

    //fonction qui permet mettre disponible ou pas 
    public static function setAvailability($idMateriel,$action){
        $req = MonPdo::getInstance()->prepare('UPDATE materiels SET actif = :Actif WHERE idMateriel = :IdMateriel');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->bindParam(':Actif', $action);//0 = disponible / 1 = pas disponible
        $req->bindParam(':IdMateriel', $idMateriel);
        $req->execute();
    }
}
