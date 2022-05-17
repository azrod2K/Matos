<?php
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'showAllUser':
        utilisateurs::getAllUser();
        break;
    case 'showAllPret':
        prets::getAllLoan();
        break;
    case 'accept':
        $idPret = filter_input(INPUT_GET, 'idPret');
        prets::setValidate($idPret);
        header("Location: index.php?uc=accueil&action=show");
        break;
}
