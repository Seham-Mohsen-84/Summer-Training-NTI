<?php
class book{
    public $reader;
    public $title;
    public function Read(){
        echo ($this->reader." reads book its name is  ".$this->title);
    }
}

$book1 = new book();
$book1->reader = "Jack";
$book1->title = "Men and women";
$book1->Read();
