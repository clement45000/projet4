<?php
require_once 'models/PostDao.php';

class FrontendController{

    private $postDao;

    public function __construct(){
        // créatoin de l'objet des l'instanciation de la class
        $this->postDao = new PostDao();
    }

    public function getHome(){
        $lastPosts = $this->postDao->getLastSixPost();
        require_once "views/front/home.php";
    }

    public function getPost(){
        require_once "views/front/post.php";
    }

  



}

?>