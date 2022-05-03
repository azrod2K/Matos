<?php
session_start();
if (!isset($_SESSION['userConnected'])) {
    $_SESSION['userConnected'] = [
        "username" => "",
        "online" => false,
        "idUser" => null,
        "isAdmin" => null
    ];

    $_SESSION['alertMessage'] = [
        "type" => null,
        "message" => null
    ];
}

require("models/MonPdo.php");
require("models/images.php");
require("models/utilisateurs.php");
require("models/prets.php");
require("models/materiels.php");

include "vues/header.php";

$uc = filter_input(INPUT_GET, 'uc') == null ? "accueil" : filter_input(INPUT_GET, 'uc'); // affiche la page accueil par défaut
switch ($uc) {
    case 'accueil':
      include "vues/accueil.php";
        break;
    case 'login':
        include "controllers/login_controller.php";
        break;
}
include "vues/footer.php";

?>