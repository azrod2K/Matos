<?php
$action = filter_input(INPUT_GET, 'action');
switch ($action) {

        // affichage du formulaire de login
    case 'show':
        materiels::GetAllMateriel();
        break;
    case 'ajout':
        include "vues/ajoutMateriel.php";
        break;
    case 'validateAdd':

        $marque = filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING); //récupération de la marque
        $categorie = filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING); //récupération de la catégorie
        $desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING); //récupération de la description
        $image = $_FILES['image']; //récupération de l'image

        // vérification que tout les champs sont bien remplis
        if ($marque != "" && $categorie != "" && $desc != "" && $image['name'][0] != "") {

            if (explode("/", $image["type"])[0] != "image") {
                $_SESSION['alertMessage'] = [
                    'type' => "danger",
                    'message' => "le fichier ne peut être que une image"
                ];
                header('Location: index.php?uc=materiel&action=ajout');
            }
            //début de la transaction
            MonPdo::getInstance()->beginTransaction();

            //on crée le matériel
            $materiels = new materiels();
            $materiels->setMarque($marque)
                ->setCategorie($categorie)
                ->setDescription($desc);
            $idMateriel = materiels::AddMaterial($materiels);

            $dirFile = "./assets/img/materiel/";
            $randomName = uniqid() . "." . $image['name'];
            if (move_uploaded_file($image['tmp_name'], $dirFile . $randomName)) {
                $images = new images();
                $images->setLienImage($dirFile)
                    ->setNomImage($randomName)
                    ->setIdMateriel($idMateriel);
                images::AddImage($images);
            } else {
                //si il y a une image qui ne se push pas on rollback et cancel les requêtes
                MonPdo::getInstance()->rollback();
                $_SESSION['alertMessage'] = [
                    'type' => "danger",
                    'message' => "une image n'a pas pu être publié !"
                ];
                header('Location: index.php?uc=materiel&action=ajout');
            }
            //on push les infos dans la base de données avec le commit
            MonPdo::getInstance()->commit();

            //message de success de création de matériel et de l'image
            $_SESSION['alertMessage'] = [
                'type' => "success",
                'message' => "le matériel à bien été crée et tous les fichiers ont été importés"
            ];
            header('Location: index.php?uc=accueil&action=show');
        } else {
            //retourne un message d'erreur si les champs ne sonts pas remplis
            $_SESSION['alertMessage'] = [
                'type' => "danger",
                'message' => "merci de remplir tous les champs !"
            ];
            header("Location: index.php?uc=materiel&action=ajout");
        }
        break;
}
