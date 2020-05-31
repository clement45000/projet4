<?php
//function statique utilisable sans instantcier la class
class Securite {

    public static function secureHTML($string){
        return htmlspecialchars($string);
    }

    public static function getCookiePass(){
        
    }
}