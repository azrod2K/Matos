<?php
session_start();
if (!isset($_SESSION['userConnected'])) {
    $_SESSION['userConnected'] = [
        "email" => "",
        "online" => false,
        "idutilisateur" => "",
        "statut" => null,
        "noTel" => "",
        "pseudo" => "",
        "motDePasse" => ""
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
        include "controllers/materiel_controller.php";
        break;
    case 'login':
        include "controllers/login_controller.php";
        break;
    case 'categorie':
        include "controllers/categorie_controller.php";
        break;
    case 'materiel':
        include "controllers/materiel_controller.php";
        break;
    case 'admin':
        include "controllers/admin_controller.php";
        break;
    case 'calendriers';
    $idMateriel = filter_input(INPUT_GET,'idMateriel');
    //$materiel = materiels::getMaterielById($idMateriel);
    require_once("function/calendrier.php");
    include "vues/calendar.php";
    break;
}
include "vues/footer.php";
error_reporting(E_ALL);
