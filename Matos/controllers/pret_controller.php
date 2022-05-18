<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos    
-!>
<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'validate':
        $idmateriel = filter_input(INPUT_GET, 'idMateriel');
        $date = filter_input(INPUT_GET,'date');
        $currentDate = date('Y-m-d');
        $pret = new prets();
        $pret->setDateReservation($currentDate)
             ->setDateDebut($date)
             ->setDateFin($date)
             ->setIdMateriel($idmateriel)
             ->setIdUtilisateur($_SESSION['userConnected']['idUtilisateur']);
        prets::addPret($pret);
        header("Location: index.php?uc=accueil&action=show");
        break;
}
