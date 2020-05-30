<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';
require_once 'models/MemberDao.php';

class BackendController{

    private $postDao;
    private $commentDao;
    private $memberDao;

    public function __construct(){
        $this->postDao = new PostDao();
        $this->commentDao = new CommentDao();
        $this->memberDao = new MemberDao();
    }

    //AFFICHE UN TABLEAU DES ARTICLES AVEC ACTION DE BASE DU CRUD
    public function AdminHome(){
        $title = 'Administration';
        if($_SESSION['acces'] === '1'){
        $allPosts = $this->postDao->getAllPosts();
        $getcommentsreported = $this->commentDao->getCommentsReported();
        }else{
            header('Location:?page=home');
        }
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
         header('Location:?page=validation'); 
    }

    //Validation du commentaire supprimé
    public function validate(){
        $title = 'Administration';
        require_once "views/back/deletecomment.php";
    }


    //CREER UN ARTICLE
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

      public function ignoreComment(){
          $title = 'Administration';
          $ignorereport = $this->commentDao->ignoreCommentReported($_GET['comment']);//id_commentaire
          header('Location:?page=admin');
      }

    public function deleteCommentReported(){
        $title="admin";
        $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['comment']);
        header('Location:?page=admin');
    }
 

    public function getSignUp() {
        $title = 'Inscription';
        require_once "views/front/signup.php";
    }

     //Authentification 
     public function getLogIn() {
        $title = 'connexion';
        $errors = '';
        $validation ='';
        var_dump($_SESSION);


        if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])){

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            $identification = $this->memberDao->userIdentification($pseudo,$password); 

            $validpassword = password_verify($password, $identification['password']);
         if(!$identification){
             $errors ='mauvais identifiant ou mot de passe';
         } else {
             
             if($validpassword) {
                 $_SESSION['acces'] = $identification['role_user'];
                 $_SESSION['pseudo'] = $pseudo;
                 header('Location: ?page=admin');
                //  echo 'vous êtes connecté !';
            } 
            if($_SESSION['acces'] === '1'){
                header('Location:?page=admin');
            }
                if($_SESSION['acces'] === '2'){
                    header('Location:?page=home');
                }
            else {
                $errors ='mauvais identifiant ou mot de passe';
           }
         }
        }
        require_once "views/front/login.php";
    }  
    

}

?>