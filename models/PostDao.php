<?php
require_once "models/Model.php";

class PostDao extends Model{

    public function getLastSixPost(){
            $lastPosts = $this->getPdoConnexion()->query("SELECT * From posts order by id_post desc limit 0,5");
            return $lastPosts;
    }

    public function getPostById($idpost){
        $postById = $this->getPdoConnexion()->prepare('select id_post, title_post, content_post, author_post, date_post from posts where id_post=?');
        $postById->execute(array($idpost));
        return $postById->fetch(); //On va chercher une seul colonne celle ou l'id correspon à la var passé en param
    }

    public function getAllPosts(){
        $allPosts = $this->getPdoConnexion()->query("SELECT * From posts order by id_post desc");
        return $allPosts;
    
    }

    public function createPostdb($title, $date, $content, $author){
        $create = $this->getPdoConnexion()->prepare('INSERT INTO posts(title_post,date_post,content_post,author_post) VALUES(?, ?, ?, ?)');
        $resultat = $create->execute(array($title, $date, $content, $author));
        return $resultat;
    }
    public function deletePostAndComments($idpost){
        $delete = $this->getPdoConnexion()->prepare('DELETE FROM posts WHERE id_post =?');
        $delete->execute(array($idpost));
        $delete = $this->getPdoConnexion()->prepare('DELETE FROM comments WHERE post_id=?');
        $delete->execute(array($idpost));
        return $delete;
  
    }
    // public function deletePostAndComments($idpost){
    //     $delete_post = $this->getPdoConnexion()->prepare('DELETE FROM posts WHERE id_post =?');
    //     $delete_com = $this->getPdoConnexion()->prepare('DELETE FROM comments WHERE post_id=?');
    //     $delete_post->execute(array($idpost));
    //     $delete_com->execute(array($idpost));
    //     return $delete_post;
    //     return $delete_com;

    // }


    // $req_comm=$bdd->prepare('DELETE FROM commentaires WHERE id_billet = ?');
    // $req=$bdd->prepare('DELETE FROM billets WHERE id = ?');
    // $req_comm->execute([$_GET['id']]);



}