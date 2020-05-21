<?php 
require_once "controllers/FrontendController.php";
require_once "controllers/BackendController.php";
$frontController = new FrontendController();
$backController = new BackendController();


    if(isset($_GET['page']) && !empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home": $frontController->getHome();
                break;
                case "post": $frontController->getPost();
                break;
                case "biographie": $frontController->getBiographie();
                break;
                case "posts": $frontController->getPosts();
                break;
                case "contact": $frontController->getContact();
                break;
                case "signup": $frontController->getSignUp();
                break;
                case "login": $frontController->getLogIn();
                break;
                case "admin": $backController->adminHome();
                break;
                case "createpost": $backController->createPost();
                break; 
                case "updatepost": $backController->updatePost();
                break; 
            }
        } else {
            $frontController->getHome();
}