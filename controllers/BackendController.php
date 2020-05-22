<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';

class BackendController{

    private $postDao;
    private $commentDao;

    public function __construct(){
        // créatoin de l'objet des l'instanciation de la class
        $this->postDao = new PostDao();
        $this->commentDao = new CommentDao();
    }

    public function AdminHome(){
        $title = 'Administration';
        $allPosts = $this->postDao->getAllPosts();
        require_once "views/back/admin.php";
    }

    public function deleteComment(){
        $title = 'deletecomment';
        $postById = $this->postDao->getPostById($_GET['id']); //['id'] param url du lien de home (lire la suite et titre)
        $commentsById = $this->commentDao->getCommentsById($_GET['id']);
        require_once "views/back/deletecomment.php";
    }

    public function createPost(){
        $title = 'Administration';
        require_once "views/back/addpost.php";
    }

    public function updatePost(){
        $title = 'Administration';
        require_once "views/back/updatepost.php";
    }



}

?>