<?php
require_once "models/Model.php";

class PostDao extends Model {

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
        $allPosts = $this->getPdoConnexion()->query("SELECT * From posts");
        return $allPosts;
    
    }

}