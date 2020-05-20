<?php 
require_once "controllers/FrontendController.php";
$controler = new FrontendController();

    if(isset($_GET['page']) && !empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home":  $controler->getHome();
                break;
            }
        } else {
           $controler->getHome();
}