<?php
session_start();
if (!isset($_SESSION['userConnected'])) {
    $_SESSION['userConnected'] = [
        "email" => "",
        "online" => false,
        "idutilisateur" => null,
        "statut" => null
    ];

    $_SESSION['alertMessage'] = [
        "type" => null,
        "message" => null
    ];
}
ini_set('display_errors', 1);
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
    case 'categorie':
        include "controllers/categorie_controller.php";
        break;
}
include "vues/footer.php";
error_reporting(E_ALL);
?>