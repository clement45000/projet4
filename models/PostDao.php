<?php
require_once "models/Model.php";

class PostDao extends Model {

    public function getLastSixPost(){
            $lastPosts = $this->getPdoConnexion()->query("SELECT * From posts order by id_post desc limit 0,5");
            return $lastPosts;
    }

    

}