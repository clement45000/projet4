<?php
require_once "models/Model.php";

class CommentDao extends Model {

    public function getCommentsById($idpost) {
        $commentsById = $this->getPdoConnexion()->prepare('select id_comment, pseudo_comment, content_comment, date_comment from comments where post_id=?');
        $commentsById->execute(array($idpost));
        return $commentsById; 
    }

    

}