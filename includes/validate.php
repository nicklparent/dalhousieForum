<?php
// Validate functionality
class validater {
    private static $sqlMeanCodes = "/\b(SELECT|INSERT|UPDATE|DELETE|DROP|CREATE|ALTER)\b/i";
    private static $regUsername = "/^[a-zA-Z0-9]+$/";
    private static $regPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!\-@#$%^&*_{}+\\\;:.,\[\]()~`]).{8,}$/";

    private $valid;
    public function __construct(){
        $this->valid = true;
    }

    public function validateMessage($data){
        if ($data === ""){
            $this->valid = false;
        }
        if ($this->injectionCheck($data)){
            $this->valid = false;
        }

        return $this->valid;
    }

    public function validatePassword($data){
        if ($data === ""){
            $this->valid = false;
        }
        if (preg_match(self::$regPassword, $data)){
            $this->valid = false;
        }
        if ($this->injectionCheck($data)){
            $this->valid = false;
        }
        return $this->valid;
    }
    public function validateUsername($data){
        if ($data === ""){
            $this->valid = false;
        }
        if (preg_match(self::$regUsername, $data)){
            $this->valid = false;
        }
        if ($this->injectionCheck($data)){
            $this->valid = false;
        }
        return $this->valid;
    }

    private function injectionCheck($data){
        $currCheck = true;
        if (preg_match(self::$sqlMeanCodes, $data)){
            $currCheck = false;
        }
        return $currCheck;
    }
}
?>