<?php

namespace TZend;

class Test {

    public static function hash($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function checkHash($string, $hash){
        if( password_verify( $string, $hash ) ){
            return true;
        }
        return false;
    }

}
