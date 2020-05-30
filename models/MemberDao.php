<?php
require_once "models/Model.php";


class MemberDao extends Model{

   
        public function userIdentification($pseudo,$password){
            $getpassword = $this->getPdoConnexion()->prepare('SELECT * FROM administrateur WHERE login= :login');
   
            $getpassword->execute(array('login' => $pseudo));
            return $getpassword->fetch();
           
       }  
  
}