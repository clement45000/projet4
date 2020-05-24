<?php
// On declare une classe abstrait pour un notion d'héritage(class mère qui aura plusieurs filles)
abstract class Model{
        
    private static $pdo;

    private static function setPdoConnexion(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=alaska;charset=utf8",'root','');
        
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    
    protected function getPdoConnexion(){
        if(self::$pdo === null){ 
            self::setPdoConnexion();       
        }
        return self::$pdo;
    }
}