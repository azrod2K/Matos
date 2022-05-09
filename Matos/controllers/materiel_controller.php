<?php
$action = filter_input(INPUT_GET, 'action');
switch ($action) {

        // affichage du formulaire de login
    case 'show':
       materiels::GetAllMateriel();
        break;
    case 'ajout':
        include "vues/ajoutMateriel.php";
        break;
    case 'validateAdd':
        
        break;
}
