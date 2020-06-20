<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';
require_once 'models/UtileDao.php';

class FrontendController{

    private $postDao;
    private $commentDao;
    private $utileDao;

    public function __construct(){
        // créatoin de l'objet des l'instanciation de la class
        $this->postDao = new PostDao();
        $this->commentDao = new CommentDao();
        $this->utileDao = new UtileDao();
    }

    public function getHome(){
        $title = 'Accueil';
        $lastPosts = $this->postDao->getLastPost();
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
         
            if(isset($_GET['id']) && ($_GET['id']) >0){
            $postById = $this->postDao->getPostById($_GET['id']); 
            $commentsById = $this->commentDao->getCommentsById($_GET['id']);
          
                if(!empty($_POST)){ //Si le form est remplit et les information envoyé
                    if(!empty($_POST['pseudo']) && !empty($_POST['content'])){ //si les champs ne sont pas vides
                        //ajoute le commentaire
                        $comment_title = htmlspecialchars($_POST['pseudo']); 
                        $comment_content = htmlspecialchars($_POST['content']); 
                        $comment_flag = htmlspecialchars($_POST['flag']); 
                        $comment_idpost = htmlspecialchars($_POST['idpost']); 
                        $addcomment = $this->commentDao->addCommentdb($comment_title, $comment_content, $comment_flag, $comment_idpost);
                        header('Location:commentadd'); 
                    }else{
                        $pseudoform = ($_POST['pseudo']); 
                        $invalid ='Tous les champs doivent êtres remplis';
                    } 
                }
            }else{
                throw new Exception("Cette page n'existe pas");
            }
            require_once "views/front/post.php";
    }
    
    //VALIDATION AJOUT DU COMMENTAIRE
    public function commentIsAdd()
    {
        $title = 'validation du commentaire';
        require_once "views/front/commentadd.php";
    }

     //SIGNALER UN COMMENTAIRE
    public function reportComment(){//if variable existe execute sinn renvoi un erreur
        $title = 'Jean Forteroch';
        if(isset($_GET['id'])){
            $report = $this->commentDao->updateCommentForReporte(($_GET['id']));///On veut récupérer l'id du commentaire
        } else {
            throw new Exception("Cette page n'existe pas");
        }
        require_once "views/front/reportcomment.php";
    }

    //AFFICHER LA BIOGRAPHIE
    public function getBiographie() {
        $title = 'Biographie';
        $biographie = $this->utileDao->getBiographie();
        require_once "views/front/biographie.php";
    }

    //AFFICHER TOUS LES ARTICLES
    public function getPosts() {
        $title = 'Toute mes aventures';
        $allPosts = $this->postDao->getAllPosts();
        require_once "views/front/posts.php";
    }

    //FORMULAIRE DE CONTACT
    public function getContact() {
        $title = 'Contactez-moi';
        $unvalidObjet ='';
        $unvalidfirstname ='';
        $unvalidname ='';
        $unvalidmail ='';
        $unvalidmessage = '';
        $mailerror ='';
        $mailvalid = '';
       

         if(!empty($_POST)){
             extract($_POST);
             $valid = true;
             if(empty($objet)){
                 $valid=false;
                 $unvalidObjet ="Vous n'avez pas indiqué d'objet";
             }
             if(empty($nom)){
                 $valid=false;
                 $unvalidfirstname ="Vous n'avez pas indiqué votre nom";
             }
             if(empty($prenom)){
                 $valid=false;
                 $unvalidname ="Vous n'avez pas indiqué votre prénom";
             }
             if(!preg_match("/^[a-z0-9-_.]+@[a-z0-9-_.]+\.[a-z]{2,3}$/i",$mail)){
                 $valid =false;
                 $unvalidmail='Email invalid';
             }
            if(empty($mail)){
                 $valid=false;
                 $unvalidmail ="Vous n'avez pas indiqué votre adresse mail";
             }
             if(empty($message)){
                $valid=false;
                $unvalidmessage ="Vous n'avez écrit votre message";
             }
             if($valid){
                $to = "clement.larpent@gmail.com";
                $sujet = $nom . "contact du site";
                $header = "From: $nom <$mail>";
                if(mail($to, $sujet, $message, $header)){
                 $mailvalid = 'Votre message a bien été envoyé';
                 unset($objet);
                 unset($nom);
                 unset($prenom);
                 unset($mail);
                 unset($message);
                }
                else{
                    $mailerror = "Une erreur est survenue et votre mail n'est pas parti";
                }
             }
         }


        require_once "views/front/contact.php";
    }


}

?>