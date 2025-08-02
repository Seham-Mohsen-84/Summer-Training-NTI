<?php
class course{
    private $instructor;
    private $title;
    public function __construct($instructor, $title){
        $this->instructor = $instructor;
        $this->title = $title;
    }
    public function descripe(){
        echo "instructor: ".$this->instructor."<br>";
        echo "title: ".$this->title."<br>";
    }
}

$course1 = new course("ENG.Ahmed","OOP");
$course1->descripe();
