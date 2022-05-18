# Site de location de matériel
Projet TPI de Machado David

## Description
Création d'un site de location de matériel

## Installation de la DB
Récupérez le script SQL dans /assets/database/matos.sql

Pour configurer les accès à votre database depuis le site, rendez-vous ensuite dans /models/MonPdo.php

    private static $serveur = 'mysql:host=127.0.0.1' <- ip de votre serveur MySQL;
    private static $bdd = 'dbname=MatosV2';
    private static $user = 'user' <- nom de l'utilisateur (à modifier);
    private static $mdp = 'pwd' <- mot de passe de votre utilisateur (à modifier);
    
## Données de test

### compte admin
Email: admin@admin.ch

Mot de passe: Superadmin

### Compte utilisateur
Email: david.mchdb@eduge.ch

Mot de passe: Super1234
