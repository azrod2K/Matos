<?php
class prets
{
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
    public static function setValidate($idPret){
        $req = MonPdo::getInstance()->prepare('UPDATE prets SET validation = 1 WHERE idPret = :IdPret');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prets');
        $req->bindParam(':IdPret', $idPret);
        $req->execute();
    }
    public static function getUnavailableDatesByPlate($idMateriel)
    {
        $req = MonPdo::getInstance()->prepare("SELECT dateDebut,dateFin FROM prets WHERE idMateriel = :IDMateriel");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prets');
        $req->bindParam(':IDMateriel',$idMateriel);
        $req->execute();
        $retourSQL = $req->fetchAll();
        return $retourSQL;
    }
    //affichage de tous les prêts
    public static function getAllLoan()
    {
        $sql = MonPdo::getInstance()->prepare("SELECT idPret,dateReservation,dateDebut,dateFin,email,marque,validation FROM prets as p,materiels as m, utilisateurs as u WHERE u.idUtilisateur = p.idUtilisateur and m.idMateriel = p.idMateriel ORDER BY validation ASC");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prets');
        $sql->execute();

        $result = $sql->fetchAll();
        echo "<div class='table-responsive'>";
        echo "<table class='table table-info table-responsive' >";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Date de reservation</th>";
        echo "<th scope='col'>Date de début</th>";
        echo "<th scope='col'>Date de fin</th>";
        echo "<th scope='col'>Utilisateur</th>";
        echo "<th scope='col'>Matériel</th>";
        echo "<th scope='col'>Statut</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        foreach ($result as $value) {
            echo "<tr>";
            echo "<td>" . $value->getDateReservation() . "</td>";
            echo "<td>" . $value->getDateDebut() . "</td>";
            echo "<td>" . $value->getDateFin() . "</td>";
            echo "<td>" . $value->email . "</td>";
            echo "<td>" . $value->marque . "</td>";
            if ($value->getValidation() == 1) {
                echo "<td>valider ✔</td>";
            } else if ($value->getValidation() == 0) {
                echo "<td>en attente ⌛</td>";
            }
            echo "<td style='text-align: center;'><a href='index.php?uc=admin&action=accept&idPret=" . $value->getIdPret() . "' style='border: 1px solid black;font-size: 100%;' class='btn btn-outline-success''>Valider</a></td>";
            echo "</tr>";
        }
        echo "</thead>";
        echo "</table>";
        echo "</div>";
    }
}
