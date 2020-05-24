<?php
require_once "models/Model.php";

class CommentDao extends Model {

    public function getCommentsById($idpost) {
        $commentsById = $this->getPdoConnexion()->prepare('select id_comment, pseudo_comment, content_comment, date_comment, post_id from comments where post_id=?');
        $commentsById->execute(array($idpost));
        return $commentsById; 
    }

    public function deleteCommentById($idpost){
        $deletecomment = $this->getPdoConnexion()->prepare('DELETE FROM comments WHERE id_comment =?');
        $deletecomment->execute(array($idpost));
        return $deletecomment;
    }

    

}