<?php 
session_start();
require_once "controllers/FrontendController.php";
require_once "controllers/BackendController.php";
$frontController = new FrontendController();
$backController = new BackendController();
define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
try{
    if(!empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home": $frontController->getHome();//Accueil avec les 6 derniers articles front
                break;
                case "post": $frontController->getPostAndComment();// Article en particulier avec ses commentaires front
                break;
                case "biographie": $frontController->getBiographie(); // Biographie front
                break;
                case "posts": $frontController->getPosts(); // Tous les articles front
                break;
                case "contact": $frontController->getContact(); // formulaire de contact front
                break;
                case "signup": $backController->getSignUp(); //Inscription front
                break;
                case "login": $backController->getLogIn(); // Connexion front
                break;
                case "logout": $backController->getLogout(); // deonnexion front
                break;
                case "comment": $frontController->addComment(); // Ajouter un commentaire
                break;
                case "commentadd": $frontController->commentIsAdd(); // Ajouter un commentaire
                break;
                case "reportcomment": $frontController->reportComment(); // SIGNALER UN COMMENTAIRE
                break;
                case "deletecomment": $backController->deleteComment(); //Supprimer un Commentaire
                break;
                case "deletecommentreported": $backController->deleteCommentReported(); //Supprimer un Commentaire
                break;
                case "ignorecomment": $backController->ignoreComment(); //Ignorer un commentaire signalé
                break;
                case "admin": $backController->adminHome(); //Admin accueil back
                break;
                case "updatebio": $backController->updateBiographie(); //modifier la biographie
                break;
                case "createpost": $backController->createPost(); // Ajouter un article back
                break; 
                case "deletepost": $backController->deletePost(); //Supprimer un Article et ses commentaires
                break;
                case "updatepost": $backController->updatePost(); // Modifier un article back
                break; 
                case "validation": $backController->validate(); //Confirmation de suppresion d'un commentaire
                break;
                case "postadmin": $backController->postAdmin(); //Affiche un article et ses commentaires
                break;  
                case "error403": throw new Exception("Vous ne pouvez pas accéder à cette page");
                break;
                case "error404":
                default :  $frontController->getHome();//throw new Exception("la page n'existe pas");
            }
        } else {
            $frontController->getHome();
        }
    }catch(Exception $e){ //si exception attrapé on redirige vers notre view error
    $title = "Error";
    $errorMessage = $e->getMessage();
    require 'views/commons/errorview.php';
    }
