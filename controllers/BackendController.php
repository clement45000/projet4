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

    //AFFICHE UN TABLEAU DES ARTICLES AVEC ACTION DE BASE DU CRUD
    public function AdminHome(){
        $title = 'Administration';

        $allPosts = $this->postDao->getAllPosts();
        $getcommentsreported = $this->commentDao->getCommentsReported();
        require_once "views/back/admin.php";
    }

    //AFFICHE UN ARTICLE ET SES COMMENTAIRE COTE ADMIN
    public function postAdmin(){
        $title = 'Administration';
         $postById = $this->postDao->getPostById($_GET['id']); //on recupere l'id et on affiche l'article (affichage)
         $commentsById = $this->commentDao->getCommentsById($_GET['id']); // on recupere l'id et on affiche les com liées à l'article (affichage)
        require_once "views/back/postadmin.php";
    }


    //SUPPRIMER UN ARTCILE ET SES COMMENTAIRE ASSOCIES
    // btn supprimer dans admin
    public function deletePost(){
        $title = 'Administration';
        $deletePost = $this->postDao->deletePostAndComments($_GET['id']); 
        header('Location:?page=admin');
    }

    //SUPPRIMER UN COMMENTAIRE EN PARTICULIER
    public function deleteComment(){
         $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['id']);
         header('Location:?page=validation'); //test
        //  require_once "views/back/deletecomment.php";
    }

    public function validate(){
        $title = 'Administration';
        require_once "views/back/deletecomment.php";
    }


    //CREER UN ARTICLE ET AJOUTER
     public function createPost(){
         $title = 'Administration';
         $valid = '';
         $unvalid ='';
         $title_art='';
         $date_art='';
         $content_art='';
         $author_art='';

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
                $title_art = ($_POST['title']);
                $date_art = ($_POST['date']);
                $content_art = ($_POST['content']);
                $author_art = ($_POST['author']);
             }

         }
         require_once "views/back/addpost.php";
     }

    //MODIFICATION D UN ARTICLE 
     public function updatePost(){
        $title = 'Administration';
        $update = $this->postDao->getPostById($_GET['id']);
        if(isset($_POST['title']) && !empty($_POST['title']) &&  isset($_POST['content']) && !empty($_POST['content'])  &&  isset($_POST['author']) && !empty($_POST['author'])){
        $updatepost = $this->postDao->updatepostFromDb($_POST['title'], $_POST['content'], $_POST['author'], $_GET['id']);
        header('Location: ?page=admin');
        } else {                
             
        }
        require_once "views/back/updatepost.php";
        }
 
}

?>