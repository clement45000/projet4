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
    //Lecture d'un billet via son id
    public function getPost(){
        $title = 'Article';
        $postById = $this->postDao->getPostById($_GET['id']); //Affiche un article via l'id 
        $commentsById = $this->commentDao->getCommentsById($_GET['id']); //Afficher un commentaire via son id
        require_once "views/front/post.php";
    }

    //AJOUT COMMENTAIRE ATTENTION  probleme de traitement condition et redirection
     public function addComment(){
         $title = 'commentaire validation';  
        
             $comment_title = htmlspecialchars($_POST['pseudo']); 
             $comment_content = htmlspecialchars($_POST['content']); 
             $comment_flag = htmlspecialchars($_POST['flag']); 
             $comment_idpost = htmlspecialchars($_POST['idpost']); 

             $addcomment = $this->commentDao->addCommentdb($comment_title, $comment_content, $comment_flag, $comment_idpost);
             header('Location: ?page=post&id='.$comment_idpost);
            
     }

     //SIGNALER UN COMMENTAIRE
    public function reportComment(){
        $title = 'Jean Forteroch';
        $report = $this->commentDao->updateCommentForReporte($_GET['id']);//id_commentaire
        require_once "views/front/reportcomment.php";
    }

    public function getBiographie() {
        $title = 'Biographie';
        require_once "views/front/biographie.php";
    }

    public function getPosts() {
        $title = 'Toute mes aventures';
        $allPosts = $this->postDao->getAllPosts();
        require_once "views/front/posts.php";
    }

    public function getContact() {
        $title = 'Contactez-moi';
        require_once "views/front/contact.php";
    }

}

?>