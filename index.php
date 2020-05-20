<?php 
require_once "controllers/FrontendController.php";

    if(isset($_GET['page']) && !empty($_GET['page'])){
        $url = htmlspecialchars($_GET['page']);
            switch ($url){
                case "home": getHome();
                break;
            }
        } else {
            getHome();
}