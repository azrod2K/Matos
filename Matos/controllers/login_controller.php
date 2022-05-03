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
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($mail != "" && $password != "") {
            // si les champs sont remplis
            $user = new utilisateurs();
            $user->setEmail($mail)
            ->setMotDePasse($password);

            $reqResult = utilisateurs::VerifierConnexion($user);
            if($reqResult != false){
                if($reqResult->getEmail() == $mail && $reqResult->getMotDePasse() == utilisateurs::Crypter($password)){
                    $_SESSION['userConnected'] = [
                        "username" => $reqResult->getTxt_Mail(),
                        "online" => true,
                        "idUser" => $reqResult->getId(),
                        "isAdmin" => $reqResult->getIsAdmin()
                    ];
                    header('Location: index.php');
                }else{
                    $_SESSION['alertMessage'] = [
                        "type" => "danger",
                        "message" => "Email ou mot de passe incorrect"
                    ];
                    header("Location: index.php?uc=login&action=show");
                }
            }else{
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
            break;

        // déconnexion de l'utilisateur
        case 'deconnecter':
            session_destroy();
            session_unset();
            header('Location: index.php');
            break;

            default :
            header('Location: index.php?uc=login&action=show'); 
            break;

}
