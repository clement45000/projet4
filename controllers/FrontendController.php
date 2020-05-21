<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';

class FrontendController{

    private $postDao;
    private $commentDao;

    public function __construct(){
        // créatoin de l'objet des l'instanciation de la class
        $this->postDao = new PostDao();
        $this->commentDao = new CommentDao();
    }

    public function getHome(){
        $title = 'Accueil';
        $lastPosts = $this->postDao->getLastSixPost();
        require_once "views/front/home.php";
    }

    public function getPost(){
        $title = 'Article';
        $postById = $this->postDao->getPostById($_GET['id']); //['id'] param url du lien de home (lire la suite et titre)
        $commentsById = $this->commentDao->getCommentsById($_GET['id']);
        require_once "views/front/post.php";
    }

    public function getBiographie() {
        $title = 'Biographie';
        require_once "views/front/biographie.php";
    }



  



}

?>