<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos    
-!>
<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show':
        include "vues/categorie.php";
        break;
    case 'liste':
        $selected = filter_input(INPUT_GET, 'selected');
        materiels::getMaterielByCategorie($selected);
        include "vues/materielByCategorie.php";
        break;
}
