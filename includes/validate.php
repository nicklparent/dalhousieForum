<?php
// Validate functionality
class validater {
    private $valid;
    public function __construct(){
        $this->valid = false;
    }

    public function validate($data){

    }

    private function injectionCheck($data){

    }

    public function getValid(){
        return $this->valid;
    }

}
?>