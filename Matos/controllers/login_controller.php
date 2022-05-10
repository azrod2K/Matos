<?php
$action = filter_input(INPUT_GET, 'action');
switch ($action) {

        // affichage du formulaire de login
    case 'show':
        include 'vues/login.php';
        break;

        // affichage du formulaire de register
    case 'showRegister':
        include 'vues/register.php';
        break;

        // connexion de l'utilisateur
    case 'validateLogin':
        $mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($mail != "" && $password != "") {
            // si les champs sont remplis
            $user = new utilisateurs();
            $user->setEmail($mail)
                ->setMotDePasse($password);

            $reqResult = utilisateurs::CheckConnected($user);
            if ($reqResult != false) {
                if ($reqResult->getEmail() == $mail && $reqResult->getMotDePasse() == utilisateurs::Crypter($password)) {
                    $_SESSION['userConnected'] = [
                        "email" => $reqResult->getEmail(),
                        "online" => true,
                        "idUtilisateur" => $reqResult->getIdUtilisateur(),
                        "statut" => $reqResult->getStatut(),
                        "noTel" => $reqResult->getNoTel(),
                        "pseudo" => $reqResult->getPseudo(),
                        "motDePasse" => $reqResult->getMotDePasse()
                    ];
                    header('Location: index.php?uc=accueil&action=show');
                } else {
                    $_SESSION['alertMessage'] = [
                        "type" => "danger",
                        "message" => "Email ou mot de passe incorrect"
                    ];
                    header("Location: index.php?uc=login&action=show");
                }
            } else {
                $_SESSION['alertMessage'] = [
                    "type" => "danger",
                    "message" => "Cet email n'existe pas"
                ];
                header("Location: index.php?uc=login&action=show");
            }
        } else {
            $_SESSION['alertMessage'] = [
                "type" => "danger",
                "message" => "Merci de remplir les champs !"
            ];
            header("Location: index.php?uc=login&action=show");
        }
        break;

    case 'validateRegister':
        $firstName = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $noTel = filter_input(INPUT_POST, 'noTel', FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);

        //si les champs ne sont pas vides
        if ($firstName != "" && $lastName != "" && $email != "" && $noTel != "" && $password != "") {
            if (utilisateurs::IsEmailExisting($email) == false) {
                $user = new utilisateurs();
                $user->setNom($lastName)
                    ->setPrenom($firstName)
                    ->setEmail($email)
                    ->setPseudo($pseudo)
                    ->setNoTel($noTel)
                    ->setMotDePasse($password);
                utilisateurs::AddUser($user);
                $_SESSION['alertMessage'] = [
                    "type" => "success",
                    "message" => "l'utilisateur a bien été crée"
                ];
                header("Location: index.php?uc=login&action=show");
            } else {
                $_SESSION['alertMessage'] = [
                    "type" => "danger",
                    "message" => "Cette email existe déjà"
                ];
                header("Location: index.php?uc=login&action=showRegister");
            }
        } else {
            $_SESSION['alertMessage'] = [
                "type" => "danger",
                "message" => "Merci de remplir les champs !"
            ];
            header("Location: index.php?uc=login&action=ShowRegister");
        }
        break;

    case 'showProfil':
        include "vues/profil.php";
        break;

        // déconnexion de l'utilisateur
    case 'deconnecter':
        session_destroy();
        session_unset();
        header('Location: index.php?uc=accueil&action=show');
        break;

    case 'update':
        $pseudo = filter_input(INPUT_POST,'pseudo',FILTER_SANITIZE_STRING);
        $noTel = filter_input(INPUT_POST,'notel',FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST,'mdp',FILTER_SANITIZE_STRING);

        $user=new utilisateurs();
        $user->setPseudo($pseudo)
        ->setNoTel($noTel)
        ->setMotDePasse($password);
        utilisateurs::Update($user);
        break;

    default:
        header('Location: index.php?uc=login&action=show');
        break;
}
