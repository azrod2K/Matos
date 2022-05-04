<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Matos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <img src="./assets/img/logo.jpg" width="30" height="30" alt="">&nbsp;
        <a class="navbar-brand" href="index.php?uc=login&action=showProfil">Matos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?uc=categorie&action=show">Catégorie</a>
                </li>
            </ul>
            <span class="navbar-text">
                <?php
                if ($_SESSION['userConnected']['online']) {
                ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">catégorie</a>
                        </li>
                    </ul>
                    <li class="nav-item dropdown" style=" list-style-type: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?uc=login&action=showProfil">Profile</a>
                            <a class="dropdown-item" href="index.php?uc=login&action=deconnecter">Se deconnecter</a>
                        </div>
                    </li>
                <?php
                } else {
                    echo '<a class="btn btn-success" href="index.php?uc=login&action=show">Login</a> <a class="btn btn-success" href="index.php?uc=login&action=showRegister">Register</a>';
                }
                ?>
            </span>
        </div>
        </div>
    </nav>