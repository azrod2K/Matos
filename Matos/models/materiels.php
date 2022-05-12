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
    public static function GetAllMateriel()
    {
        $req = MonPdo::getInstance()->prepare("SELECT m.idMateriel,marque,description,nomImage FROM materiels as m ,images as i WHERE i.idMateriel = m.idMateriel AND actif = 1 AND isDelete = 1");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->execute();
        $returnSQL = $req->fetchAll();
?>

        <div class="container">
            <div class="row" style="flex-wrap: wrap;  justify-content: center;">
                <?php
                foreach ($returnSQL as $materiel) {
                ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/img/materiel/<?= $materiel->nomImage ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5><?= $materiel->getMarque() ?></h5>
                            <p class="card-text"><?= $materiel->getDescription() ?></p>
                            <a class="btn btn-primary" href="index.php?uc=materiel&action=info&idMateriel=<?= $materiel->getIdMateriel() ?>">plus info</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }

    //fonction qui permet d'ajouter du matériel
    public static function AddMaterial(materiels $materiels)
    {
        $actif = 1;
        $categorie = $materiels->getCategorie();
        $dateEntreeStock = date("Y-m-d H:i:s");
        $description = $materiels->getDescription();
        $marque = $materiels->getMarque();
        $isDelete = 1;

        $sql = MonPdo::getInstance()->prepare('INSERT INTO materiels(actif, categorie, dateEntreeStock, description, marque, isDelete) VALUES(:Actif, :Categorie, :DateEntreeStock, :Description, :Marque, :IsDelete)');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $sql->bindParam(':Actif', $actif);
        $sql->bindParam(':Categorie', $categorie);
        $sql->bindParam(':DateEntreeStock', $dateEntreeStock);
        $sql->bindParam(':Description', $description);
        $sql->bindParam(':Marque', $marque);
        $sql->bindParam(':IsDelete', $isDelete);
        $sql->execute();

        return MonPdo::getInstance()->lastInsertId();
    }

    //fonction qui delete le matériel(en invisible pour les utilisateurs)
    public static function SetDelete($idMateriel, $action)
    {
        $req = MonPdo::getInstance()->prepare('UPDATE materiels SET isDelete = :deleted WHERE idMateriel = :IdMateriel');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->bindParam(':deleted', $action); // 0 = visible / 1 = pas visible
        $req->bindParam(':IdMateriel', $idMateriel);
        $req->execute();
    }

    //fonction qui permet mettre disponible ou pas 
    public static function setAvailability($idMateriel, $action)
    {
        $req = MonPdo::getInstance()->prepare('UPDATE materiels SET actif = :Actif WHERE idMateriel = :IdMateriel');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->bindParam(':Actif', $action); //0 = disponible / 1 = pas disponible
        $req->bindParam(':IdMateriel', $idMateriel);
        $req->execute();
    }
    public static function GetAllCategorie(): array
    {
        $req = MonPdo::getInstance()->prepare('SELECT DISTINCT categorie, COUNT(CASE actif WHEN 0 THEN 0 ELSE NULL END) Disponible FROM materiels WHERE isDelete = 0 GROUP BY idMateriel');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $req->execute();
        $returnSQL = $req->fetchAll();
        return $returnSQL;
    }

    public static function getMaterielById($idMateriel)
    {
        $res = MonPdo::getInstance()->prepare('SELECT marque,description,nomImage FROM materiels as m, images as i WHERE i.idMateriel = m.idMateriel AND m.idMateriel = :id');
        $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $res->bindParam(':id', $idMateriel);
        $res->execute();
        $result = $res->fetch();

        return $result;
    }
    public static function getMaterielByCategorie($selected)
    {
        $res = MonPdo::getInstance()->prepare('SELECT marque,description,nomImage FROM materiels as m, images as i WHERE m.categorie = :categorie');
        $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'materiels');
        $res->bindParam(':categorie', $selected);
        $res->execute();
        $result = $res->fetch();

    ?>

        <div class="container">
            <div class="row" style="flex-wrap: wrap;  justify-content: center;">
                <?php
                foreach ($result as $materiel) {
                ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/img/materiel/<?= $materiel->nomImage ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5><?= $materiel->getMarque() ?></h5>
                            <p class="card-text"><?= $materiel->getDescription() ?></p>
                            <a class="btn btn-primary" href="index.php?uc=materiel&action=info&idMateriel=<?= $materiel->getIdMateriel() ?>">plus info</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
<?php
    }
}
