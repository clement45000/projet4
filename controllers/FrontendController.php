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
        $lastPosts = $this->postDao->getLastPost();
      //  $jojo = $lastPosts['content_post'];
      //  $extrait = substr($lastPosts, 0,10);
        require_once "views/front/home.php";
    }
    
   
    //Lecture d'un billet via son id
    public function getPostAndComment(){
        $title = 'Article';
        $pseudoform ='';
        $commentadd ='';
        $errorcomment = ''; 
        $invalid ='';
        $validcomment = '';
       // $idurl = isset($_GET['id']);

         if(isset($_GET['id']) && ($_GET['id']) >0){
             $postById = $this->postDao->getPostById($_GET['id']); 
             $commentsById = $this->commentDao->getCommentsById($_GET['id']);
         } else {
             throw new Exception("Cette page n'existe pas");
         }
        require_once "views/front/post.php";
    }

    //AJOUT COMMENTAIRE 
    public function addComment(){
      
        $title = 'commentaire validé';  
        $validcomment ='';
        $pseudoform ='';
        $invalid ='';
        //$jojo = isset($_GET['id']);

        $postById = $this->postDao->getPostById(isset($_GET['id'])); 
        //$commentsById = $this->commentDao->getCommentsById($_GET['id']);

        if(!empty($_POST)){ //Si le form est remplit et les information envoyé
                if(!empty($_POST['pseudo']) && !empty($_POST['content'])){ //si les champs ne sont pas vides
                    //ajoute le commentaire
                    $comment_title = htmlspecialchars($_POST['pseudo']); 
                    $comment_content = htmlspecialchars($_POST['content']); 
                    $comment_flag = htmlspecialchars($_POST['flag']); 
                    $comment_idpost = htmlspecialchars($_POST['idpost']); 
                    $addcomment = $this->commentDao->addCommentdb($comment_title, $comment_content, $comment_flag, $comment_idpost);
                    header('Location:?page=commentadd'); 
                 
                }else{
                    $pseudoform = ($_POST['pseudo']); 
                    $invalid ='Tous les champs doivent êtres remplis';
                } 
        }
        require_once "views/front/post.php";
    }
    
    public function commentIsAdd()
    {
        $title = 'validation du commentaire';
        require_once "views/front/commentadd.php";
    }

     //SIGNALER UN COMMENTAIRE
    public function reportComment(){//if variable existe execute sinn renvoi un erreur
        $title = 'Jean Forteroch';
        if(isset($_GET['idjojo'])){
            $report = $this->commentDao->updateCommentForReporte(($_GET['idjojo']));///On veut récupérer l'id du commentaire
        } else {
            echo 'erreur';// throw new Exception("Cette page n'existe pas");
        }
       // $report = $this->commentDao->updateCommentForReporte(($_GET['idjojo']));///On veut récupérer l'id du commentaire
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