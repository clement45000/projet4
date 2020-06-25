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
                case "home": $frontController->getHome();
                break;
                case "post": $frontController->getPostAndComment();
                break;
                case "biographie": $frontController->getBiographie(); 
                break;
                case "posts": $frontController->getPosts(); 
                break;
                case "contact": $frontController->getContact(); 
                break;
                case "signup": $backController->getSignUp(); //front
                break;
                case "login": $backController->getLogIn(); //front
                break;
                case "logout": $backController->getLogout(); //front
                break;
                case "comment": $frontController->addComment(); //front
                break;
                case "commentadd": $frontController->commentIsAdd(); //front
                break;
                case "reportcomment": $frontController->reportComment(); ///front
                break;
                case "deletecomment": $backController->deleteComment(); //back
                break;
                case "deletecommentreported": $backController->deleteCommentReported(); 
                break;
                case "ignorecomment": $backController->ignoreComment(); 
                break;
                case "admin": $backController->adminHome(); 
                break;
                case "updatebio": $backController->updateBiographie(); 
                break;
                case "createpost": $backController->createPost(); 
                break; 
                case "deletepost": $backController->deletePost(); 
                break;
                case "updatepost": $backController->updatePost(); 
                break; 
                case "validation": $backController->validate(); 
                break;
                case "postadmin": $backController->postAdmin(); 
                break;  
                case "error403": throw new Exception("Vous ne pouvez pas accéder à cette page");
                break;
                case "error404":
                default :  $frontController->getHome();
            }
        } else {
            $frontController->getHome();
        }
    }catch(Exception $e){ //si exception attrapé on redirige vers notre view error
    $title = "Error";
    $errorMessage = $e->getMessage();
    require 'views/commons/errorview.php';
    }
