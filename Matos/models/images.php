<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos    
-!>
<?php
class images
{
    private $idImage;
    private $nomImage;
    private $lienImage;
    private $idMateriel;

    /**
     * Get the value of idImage
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * Set the value of idImage
     *
     * @return  self
     */
    public function setIdImage($idImage)
    {
        $this->idImage = $idImage;

        return $this;
    }

    /**
     * Get the value of nomImage
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * Set the value of nomImage
     *
     * @return  self
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    /**
     * Get the value of lienImage
     */
    public function getLienImage()
    {
        return $this->lienImage;
    }

    /**
     * Set the value of lienImage
     *
     * @return  self
     */
    public function setLienImage($lienImage)
    {
        $this->lienImage = $lienImage;

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

    //ajout d'une image dans la bases de donées
    public static function AddImage(images $images)
    {
        $nomImage = $images->getNomImage();
        $lienImage = $images->getLienImage();
        $idMateriel = $images->getIdMateriel();
        $sql = MonPdo::getInstance()->prepare('INSERT INTO images(nomImage, lienImage, idMateriel) VALUES(:nom,:lien,:id)');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'images');
        $sql->bindParam(':nom',$nomImage);
        $sql->bindParam(':lien',$lienImage);
        $sql->bindParam(':id',$idMateriel);
        $sql->execute();//executer la requette
    }
    public static function getImageById($idMateriel){
        $res=MonPdo::getInstance()->prepare('SELECT nomImage FROM images as i, materiels as m WHERE i.idMateriel = m.idMateriel AND m.idMateriel = :id');
        $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'images');
        $res->bindParam(':id', $idMateriel);
        $res->execute();
        $result=$res->fetch();

        return $result;
    }
}
