<div class="container">
    <div class="row">
        <img src="assets/img/materiel/<?= $image->getNomImage() ?>" style="width: 50%">
        <h1><?= $materiel->getMarque() ?></h1>
    </div>
    <h3><?= $materiel->getDescription() ?></h3>
    <a class="btn btn-primary" href="index.php?uc=calendriers">louer</a>
</div>
