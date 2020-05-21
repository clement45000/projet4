<?php 
require_once "controllers/FrontendController.php";
$frontController = new FrontendController();


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
            }
        } else {
            $frontController->getHome();
}