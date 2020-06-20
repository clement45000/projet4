<?php
require_once 'models/PostDao.php';
require_once 'models/CommentDao.php';
require_once 'models/MemberDao.php';
require_once 'models/UtileDao.php';


class BackendController{

    private $postDao;
    private $commentDao;
    private $memberDao;
    private $utileDao;

    public function __construct(){
        $this->postDao = new PostDao();
        $this->commentDao = new CommentDao();
        $this->memberDao = new MemberDao();
        $this->utileDao = new UtileDao();
    }

   
    public function AdminHome(){
        $title = 'Administration';
        
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $allPosts = $this->postDao->getAllPosts();
        $getcommentsreported = $this->commentDao->getCommentsReported();
     
        require_once "views/back/admin.php";
    }

    
    public function postAdmin(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
       
        if(isset($_GET['id']) && ($_GET['id']) >0){
        $postById = $this->postDao->getPostById($_GET['id']); 
        $commentsById = $this->commentDao->getCommentsById($_GET['id']); 
        } else {
             throw new Exception("Cette page n'existe pas");
        }
        require_once "views/back/postadmin.php";
    }

    
    public function deletePost(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $deletePost = $this->postDao->deletePostAndComments($_GET['id']); 
        header('Location:admin');
    }

   
    public function deleteComment(){
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['id']);
        header('Location:validation'); 
    }

   
    public function validate(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        require_once "views/back/deletecomment.php";
    }


    public function createPost(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $unvalid ='';
        $title_art='';
        $content_art='';
        $author_art='';
        $validpost='';

        if(!empty($_POST)){    
            if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['author'])){
                $post_title = htmlspecialchars($_POST['title']);
                $post_content =($_POST['content']);
                $post_author = htmlspecialchars($_POST['author']);
                $resultat = $this->postDao-> createPostdb($post_title,$post_content,$post_author); 
                $validpost ='Votre article a bien été posté';
            }else{
                $title_art=($_POST['title']);;
                $content_art=($_POST['content']);;
                $author_art=($_POST['author']);;
                $unvalid ='Tous les champs doivent être remplis';
            }   
        }
         require_once "views/back/addpost.php";
    }

    
     
    public function updatePost(){
        $title = 'Administration';

        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
            if(isset($_GET['id']) && ($_GET['id']) >0){
                $update = $this->postDao->getPostById($_GET['id']); 
                if(!empty($_POST['title']) && !empty($_POST['content'])  && !empty($_POST['author'])){
                $updatepost = $this->postDao->updatepostFromDb($_POST['title'], $_POST['content'], $_POST['author'], $_GET['id']); //Methode qui modifi la news
                header('Location:admin');
                } 
            } else{
                throw new Exception("Cette page n'existe pas");
            }    
            require_once "views/back/updatepost.php";
    }
    
   
    public function ignoreComment(){
        $title = 'Administration';
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $ignorereport = $this->commentDao->ignoreCommentReported($_GET['comment']);//id_commentaire
        header('Location:admin');
    }


    
    public function deleteCommentReported(){
        $title="admin";
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $deletecommentbyid = $this->commentDao->deleteCommentById($_GET['comment']);
        header('Location:admin');
    }

    
    public function updateBiographie(){
        $title = "admin";
        if($_SESSION['acces'] !== '1'){
            header('Location:home');
        }
        $bio = $this->utileDao->getBiographie();

        if(!empty($_POST['titlebio']) && !empty($_POST['content_bio'])){ 
            $updatebiofromdb = $this->utileDao->updateBiographie($_POST['titlebio'], $_POST['content_bio']);
            header('Location:admin');
            } 
        require_once "views/back/updatebiographie.php";
    }
 
    
    public function getLogIn() {
        $title = 'connexion';
        $pseudoform = '';
        $errors = '';
        $validation ='';

        if(!empty($_POST)){
            $pseudoform = ($_POST['pseudo']);
        
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
            
            $pseudo = ($_POST['pseudo']);
            $password = ($_POST['password']);
            $identification = $this->memberDao->userIdentification($pseudo); 
         
            if(!$identification){ 
                $errors ='mauvais identifiant ou mot de passe';
            } else { 
                $validpassword = password_verify($password, $identification['password']);
                if($validpassword) { 
                    $_SESSION['acces'] = $identification['role_user']; 
                    $_SESSION['pseudo'] = $pseudo;
                  
                } 
                if(isset($_SESSION['acces'])  && $_SESSION['acces'] === "1"){  
                    header('Location:admin'); 
                }
                    if(isset($_SESSION['acces'])  && $_SESSION['acces'] === "2"){ 
                        header('Location:home'); 
                    }
                    $errors = 'mauvais identifiant ou mot de passe';
            }
        }else{
            $errors = 'Vous devez remplir tous les champs';
        }
        } 
        require_once "views/front/login.php";
    }  

    
    public function getLogout(){
        session_destroy();
        header('Location:home');
    }


     
     public function getSignUp(){
       $title ='inscription';
       $pseudoinvalide = '';
       $errorsperso = '';
       $validate = '';
       $mdpinvalid = '';
       $mailuse = '';
       $pseudovalue= '';
       $mailvalue= '';
     
    
       if(!empty($_POST)){
            $errors = array();

            if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) { 
                $pseudoinvalide ='Le pseudo est invalide';
                $errors['pseudo'] = "pseudo non valide";
            } else {
                $pseudo = ($_POST['pseudo']); 
                $pseudoverification = $this->memberDao->pseudoVerification($pseudo); 
                if($pseudoverification){
                    $errors['pseudo'] = 'Ce pseudo est déjà pris';
                    $pseudoinvalide ='Ce pseudo est déjà utilisé';
                }
            }
            if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                $mailuse ='Veuillez ecrire une adresse';
                $errors['mail'] = "Veuillez écrire une adresse";
            } else{
                $mail = ($_POST['mail']); 
                $mailverification = $this->memberDao->emailVerification($mail);
                if($mailverification){
                    $errors['mail'] = 'Adresse mail déjà attribué';
                    $mailuse = 'Adresse mail déjà utilisé';
                }
            }
           
            if(empty($_POST['password']) || $_POST['password'] != $_POST['passwordconfirm']){
                $mdpinvalid ='Mot de passe incorrect';
                $errors['password'] = "vous devez entrez un mot de pass valide";
            }
            if(empty($errors)){
                $pseudo = ($_POST['pseudo']);
                $password = ($_POST['password']);
                $mail = ($_POST['mail']);
                $pass_hash = password_hash(($_POST['password']), PASSWORD_DEFAULT);
                $addmember = $this->memberDao->userSignUp($pseudo,$pass_hash,$mail);
                $validate = 'Votre compte a bien été créé';
            }
             
            $pseudovalue = ($_POST['pseudo']);
            $mailvalue = ($_POST['mail']);

       }        
        require_once "views/front/signup.php";
    }
}
?> 