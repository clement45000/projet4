<?php
require_once "models/Model.php";


    class MemberDao extends Model{
   
        public function userIdentification($pseudo){ // pour verifier le mot de passe
            $getpassword = $this->getPdoConnexion()->prepare('SELECT * FROM espacemembre WHERE login= :login');
            $getpassword->execute(array('login' => $pseudo));
            return $getpassword->fetch(); 
        }  

        public function userSignUp($pseudo, $password, $mail){
            $createreq = $this->getPdoConnexion()->prepare('INSERT INTO espacemembre(login, password, email, role_user) VALUES(?, ?, ?, 2)');
            $addmember = $createreq->execute(array($pseudo, $password, $mail));
            return $addmember;
        }
            
        public function pseudoVerification($pseudo){
                $pseudoverification = $this->getPdoConnexion()->prepare('SELECT id FROM espacemembre WHERE login= ?');
                $pseudoverification->execute(array($pseudo));
                return $pseudoverification->fetch(); //fetch recupère le premier enregistrement
        }

        public function emailVerification($mail){
            $mailverification = $this->getPdoConnexion()->prepare('SELECT id FROM espacemembre WHERE email= ?');
            $mailverification->execute(array($mail));
            return $mailverification->fetch();
        }         

}