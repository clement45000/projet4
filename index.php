<?php 
require_once "controllers/FrontendController.php";
$frontController = new FrontendController();


    if(isset($_GET['page']) && !empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home": $frontController->getHome();
                break;
                case "post": $frontController->getPost();
            }
        } else {
            $frontController->getHome();
}