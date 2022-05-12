<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show':
        include "vues/categorie.php";
        break;
    case 'liste':
        $selected = filter_input(INPUT_GET, 'selected');
        var_dump($selected);
        var_dump(materiels::getMaterielByCategorie($selected));
        
        materiels::getMaterielByCategorie($selected);
        die();
        include "vues/materielByCategorie.php";
        break;
}
