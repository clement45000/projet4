<?php 
require_once "controllers/FrontendController.php";
require_once "controllers/BackendController.php";
$frontController = new FrontendController();
$backController = new BackendController();


    if(isset($_GET['page']) && !empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home": $frontController->getHome();//Accueil avec les 6 derniers articles front
                break;
                case "post": $frontController->getPost();// Article en particulier front
                break;
                case "biographie": $frontController->getBiographie(); // Biographie front
                break;
                case "posts": $frontController->getPosts(); // Tous les articles front
                break;
                case "contact": $frontController->getContact(); // formulaire de contact front
                break;
                case "signup": $frontController->getSignUp(); //Inscription front
                break;
                case "login": $frontController->getLogIn(); // Connexion front
                break;
                case "Comment": $frontController->addComment(); // Ajouter un commentaire
                break;
                case "admin": $backController->adminHome(); //Admin accueil back
                break;
                case "createpost": $backController->createPost(); // Ajouter un article back
                break; 
                case "deletepost": $backController->deletePost(); //Supprimer un Article et ses commentaires
                break; 
                case "deletecomment": $backController->deleteComment(); //Supprimer un Article et ses commentaires
                break;
                case "validation": $backController->validate(); //Supprimer un Article et ses commentaires
                break;
                case "postadmin": $backController->postAdmin(); //Affiche un article et ses commentaires
                break; 
                case "updatepost": $backController->updatePost(); // Modifier un article back
                break; 
            }
        } else {
            $frontController->getHome();
}