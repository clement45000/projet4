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
    public function getPostAndComment(){
        $title = 'Article';
        $commentadd ='';
        $errorcomment = ''; 
        $validcomment = '';
        
        //Pour les billets (if ($_GET['id'] !== )
       // $jojo = intval($_GET['id']);
        // if (isset($_GET['id'])) {
        // $idBillet = intval($_GET['id']);

          $idurl = isset($_GET['id']);
         if(isset($_GET['id']) && ($_GET['id']) >0){
             $postById = $this->postDao->getPostById($_GET['id']); //Affiche un article via l'id en param
             $commentsById = $this->commentDao->getCommentsById($_GET['id']);
         } else {
             throw new Exception("Cette page n'existe pas");
         }
       //si il y a pas d'id en param il pete un cable
        //Affiche un article via l'id en param
  
       // $testcountbillet = count($postById); //Retourne le nombre de billet total via l'id en param

      //Afficher un commentaire via son id en param
         //$testcountcomment = count($commentsById);//Retour le nombre de commentaire totale

      
        //print_r('print_r pour debug id du billet est =' .$idurl);
       // echo '<br/>';
       // print_r('print_r test row nb de billet total =' .$testcountbillet);
        //echo '<br/>';
       // print_r('print_r test row nb de commentaire total = ' .$testcountcomment);
       // echo '<br/>';
       // print_r('print_r test de intval($_GET[\'id\'] = ' .$jojo); // renvoi id du billet ou 0 si echec du paramètre ou 0 en cas d'échec
       

        require_once "views/front/post.php";
    }

    //AJOUT COMMENTAIRE ATTENTION  probleme de traitement condition et redirection
    public function addComment(){
        $commentadd ='';
        $title = 'commentaire validation';  
       
        if(!empty($_POST)){ //Si le form est remplit et lesinformation envoyé

                $comment_title = htmlspecialchars($_POST['pseudo']); 
                $comment_content = htmlspecialchars($_POST['content']); 
                $comment_flag = htmlspecialchars($_POST['flag']); 
                $comment_idpost = htmlspecialchars($_POST['idpost']); 
        
                $addcomment = $this->commentDao->addCommentdb($comment_title, $comment_content, $comment_flag, $comment_idpost);
                header('Location: ?page=post&id='.$comment_idpost);
        }
      
           
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