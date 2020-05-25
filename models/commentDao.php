<?php
require_once "models/Model.php";

class CommentDao extends Model {

    public function getCommentsById($idpost) {
                                                        // DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment 
        $commentsById = $this->getPdoConnexion()->prepare('select id_comment, pseudo_comment, content_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS date_comment, post_id from comments where post_id=?');
        $commentsById->execute(array($idpost));
        return $commentsById; 
    }

    public function deleteCommentById($idpost){
        $deletecomment = $this->getPdoConnexion()->prepare('DELETE FROM comments WHERE id_comment =?');
        $deletecomment->execute(array($idpost));
        return $deletecomment;
    }

    public function addCommentdb($pseudo, $contenu, $flag, $idpost){
        $addcomment = $this->getPdoConnexion()->prepare('INSERT INTO comments(pseudo_comment, content_comment, flag_comment, post_id, date_comment) VALUES(?, ?, ?, ?, NOW())');
        $addcomment->execute(array($pseudo, $contenu, $flag, $idpost));
        return $addcomment;
    }

    public function updateCommentForReporte($id_comment){

        $report = $this->getPdoConnexion()->prepare('UPDATE comments SET flag_comment = 1 WHERE id_comment = ?');
        $report->execute(array($id_comment));
        return $report;
    }

    public function getCommentsReported(){
        $getcommentsreported = $this->getPdoConnexion()->query('SELECT id_comment, pseudo_comment, content_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment, post_id FROM comments WHERE flag_comment= 1 ORDER BY date_comment');
        return $getcommentsreported;
    }

    

}