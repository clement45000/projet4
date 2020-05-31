<?php
require_once "models/Model.php";



class MemberDao extends Model{
   
    public function userIdentification($pseudo){ //passord n'est pas utilisé
        $getpassword = $this->getPdoConnexion()->prepare('SELECT * FROM espacemembre WHERE login= :login');
        $getpassword->execute(array('login' => $pseudo));
        return $getpassword->fetch(); 
   }  
  
}