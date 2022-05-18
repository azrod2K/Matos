<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos    
-!> 
<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'showAllUser':

        if ($_SESSION['userConnected']['idutilisateur']==2) {
            utilisateurs::getAllUser();
        }
        else {
            header("Location: index.php?uc=accueil&action=show");
        }

        break;
    case 'showAllPret':
        
        if ($_SESSION['userConnected']['idutilisateur']==2) {
            prets::getAllLoan();
        }
        else {
            header("Location: index.php?uc=accueil&action=show");
        }
        break;
    case 'accept':
        $idPret = filter_input(INPUT_GET, 'idPret');
        prets::setValidate($idPret);
        header("Location: index.php?uc=accueil&action=show");
        break;
}
