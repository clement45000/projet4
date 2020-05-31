<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';
require_once 'models/MemberDao.php';
require_once 'config/Securite.php';

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
        // var_dump($_SESSION);
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $allPosts = $this->postDao->getAllPosts();
        $getcommentsreported = $this->commentDao->getCommentsReported();
     
        require_once "views/back/admin.php";
    }

    //AFFICHE UN ARTICLE ET SES COMMENTAIRE COTE ADMIN
    public function postAdmin(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $postById = $this->postDao->getPostById($_GET['id']); //on recupere l'id et on affiche l'article (affichage)
        $commentsById = $this->commentDao->getCommentsById($_GET['id']); // on recupere l'id et on affiche les com liées à l'article (affichage)
        require_once "views/back/postadmin.php";
    }


    //SUPPRIMER UN ARTCILE ET SES COMMENTAIRE ASSOCIES
    // btn supprimer dans admin
    public function deletePost(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $deletePost = $this->postDao->deletePostAndComments($_GET['id']); 
        header('Location:?page=admin');
    }

    //SUPPRIMER UN COMMENTAIRE EN PARTICULIER
    public function deleteComment(){
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['id']);
        header('Location:?page=validation'); 
    }

    //Validation du commentaire supprimé
    public function validate(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        require_once "views/back/deletecomment.php";
    }


    //CREER UN ARTICLE
    public function createPost(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
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
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $update = $this->postDao->getPostById($_GET['id']);
        if(isset($_POST['title']) && !empty($_POST['title']) &&  isset($_POST['content']) && !empty($_POST['content'])  &&  isset($_POST['author']) && !empty($_POST['author'])){
        $updatepost = $this->postDao->updatepostFromDb($_POST['title'], $_POST['content'], $_POST['author'], $_GET['id']);
        header('Location: ?page=admin');
        } else {                
             
        }
        require_once "views/back/updatepost.php";
        }
    
    //IGNORE UN COMMENTAIRE REPORTE
    public function ignoreComment(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $ignorereport = $this->commentDao->ignoreCommentReported($_GET['comment']);//id_commentaire
        header('Location:?page=admin');
      }
    // SUPPRIMER UN COMMENTAIRE REPORTE
    public function deleteCommentReported(){
        $title="admin";
        if($_SESSION['acces'] !== '1'){
            header('Location:?page=home');
        }
        $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['comment']);
        header('Location:?page=admin');
    }
 
    //CONNEXION 
    public function getLogIn() {
        $title = 'connexion';
        $pseudoform = '';
        $errors = '';
        $validation ='';
        // var_dump($_SESSION);

        //si le formulaire est remplit et envoyé
        if(!empty($_POST)){
            $pseudoform = ($_POST['pseudo']);
        
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
            
            $pseudo = ($_POST['pseudo']);
            $password = ($_POST['password']);
            $identification = $this->memberDao->userIdentification($pseudo); 
         
            if(!$identification){ //si l'identifiant ne correspond pas 
                $errors ='mauvais identifiant ou mot de passe';
            } else { //si oui on verifie le mot de pass
                $validpassword = password_verify($password, $identification['password']);
                if($validpassword) { //si le mdp est ok alors 
                    $_SESSION['acces'] = $identification['role_user']; //session est = à role_user
                    $_SESSION['pseudo'] = $pseudo;
                    //  echo 'vous êtes connecté !';
                } 
                if(isset($_SESSION['acces'])  && $_SESSION['acces'] === "1"){ // si mdp est ok et que role_user  = 1  
                    header('Location:?page=admin'); ///redirection page admin
                }
                    if(isset($_SESSION['acces'])  && $_SESSION['acces'] === "2"){ // si mdp est ok et que role_user  = 2 
                        header('Location:?page=home'); // redirection page accueil
                    }
                    $errors = 'mauvais identifiant ou mot de passe';
            }
        }else{
            $errors = 'Vous devez remplir tous les champs';
        }
          
        } 
        
        require_once "views/front/login.php";
    }  
    //DECONNEXION
    public function getLogout(){
        session_destroy();
        header('Location:?page=home');
    }


    //INSCRIPTION
    public function getSignUp(){
        $title = 'inscription';
        require_once "views/front/signup.php";
    }  
     

} 
?>