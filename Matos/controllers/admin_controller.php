<?php
$action=filter_input(INPUT_GET,'action');

switch ($action) {
    case 'showAllUser':
        utilisateurs::getAllUser();
        break;
    case 'showAllPret':
        prets::getAllLoan();
        break;
}
?>