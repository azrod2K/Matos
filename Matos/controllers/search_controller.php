<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos    
-!>
<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show':
        $word = filter_input(INPUT_POST, 'word', FILTER_SANITIZE_STRING);
        $sbm = filter_input(INPUT_POST, 'validate');
        if (isset($sbm)) {
            materiels::getMaterielBySearch("%".$word."%");
        }
        break;
}
