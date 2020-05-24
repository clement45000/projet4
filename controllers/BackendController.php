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
         $valid = '';
         $unvalid ='';

         if(isset($_POST['title'], $_POST['date'], $_POST['content'], $_POST['author'])){
             if(!empty($_POST['title']) AND !empty($_POST['date']) AND !empty($_POST['content']) AND !empty($_POST['author'])){

            $post_title = htmlspecialchars($_POST['title']);
            $post_date = htmlspecialchars($_POST['date']);
            $post_content = htmlspecialchars($_POST['content']);
            $post_author = htmlspecialchars($_POST['author']);

            //  $resultat = $this->postDao-> createPostdb($_POST['title'],$_POST['date'],$_POST['content'],$_POST['author']); 
             $resultat = $this->postDao-> createPostdb($post_title,$post_date,$post_content,$post_author); 
             header('Location: ?page=admin');
             }else {
                $unvalid = 'Veuillez remplir tous les champs';
             }

         }
         require_once "views/back/addpost.php";
     }

     public function updatePost(){
        $title = 'Administration';
        require_once "views/back/updatepost.php";
    }



 
}

?>