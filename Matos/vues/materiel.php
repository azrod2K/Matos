<!-- 
Auteur: David Machado
Date: 18.05.2022
Projet: Matos     -->

<div class="container">
    <div class="row">
        <img src="assets/img/materiel/<?= $image->getNomImage() ?>" style="width: 50%">
        <h1><?= $materiel->getMarque() ?></h1>
    </div>
    <h3><?= $materiel->getDescription() ?></h3>
    <a class="btn btn-primary" href="index.php?uc=calendriers&idMateriel=<?= $materiel->getIdMateriel()?>">louer</a>
    <?php 
    if ($_SESSION['userConnected']['statut'] == 2) {
    ?>
    <a class="btn btn-danger" href="index.php?uc=materiel&action=delete&idMateriel=<?= $materiel->getIdMateriel()?>">supprimer</a>
    <?php
    }   
    ?>
</div>
