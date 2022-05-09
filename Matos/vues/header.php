<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Matos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="./assets/img/logo.jpg" width="30" height="30" alt="">&nbsp;
    <a class="navbar-brand" href="index.php?uc=accueil&action=show">Matos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?uc=accueil&action=show">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?uc=categorie&action=show">Catégorie</a>
        </li>
        <?php
        if ($_SESSION['userConnected']['statut']==2) {        
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?uc=materiel&action=ajout">ajout</a>
        </li>
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            gérer
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="index.php?uc=login&action=showAllUser">list enseignant</a></li>
            <li><a class="dropdown-item" href="index.php?uc=materiel&action=showAllPret">list prêt</a></li>
          </ul>
        </li>
        <?php
        }
        ?>
      </ul>
      <form class="d-flex">
      <?php
        if ($_SESSION['userConnected']['online']) {
        ?>
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="index.php?uc=login&action=showProfil">profil</a></li>
            <li><a class="dropdown-item" href="index.php?uc=login&action=deconnecter">Se Déconnecter</a></li>
          </ul>
        </li>
        <?php
        }else {
            echo '<a class="btn btn-success" href="index.php?uc=login&action=show">Login</a> <a class="btn btn-success" href="index.php?uc=login&action=showRegister">Register</a>';
        }
        ?>
      </form>
    </div>
  </div>
</nav>