<?php
require_once "models/Model.php";

class UtileDao extends Model{

    public function getBiographie(){
        $biographie = $this->getPdoConnexion()->query('SELECT bio_content, biographie_title FROM biographie');
        return $biographie->fetch();
    }

    public function updateBiographie($title, $content){
        $updatebiographie = $this->getPdoConnexion()->prepare('UPDATE biographie SET biographie_title= ?, bio_content=?');
        $updatebiographie->execute(array($_POST['titlebio'], $_POST['content_bio']));
        return $updatebiographie;
    }

}