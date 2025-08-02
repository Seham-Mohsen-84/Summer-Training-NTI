<?php
header("content-type:application/json");
header("Access-Control-Allow-Origin: *");
class Student {
    public $name;
    public $age;
    public $email;
    private $isActive = false;

    public function __construct($name, $email, $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function getStatus() {
        return $this->isActive ? "active" : "inactive";
    }

    public function activate() {
        $this->isActive = true;
    }

    public function toJson() {
        return json_encode([
            "name" => $this->name,
            "age" => $this->age,
            "email" => $this->email,
            "status" => $this->getStatus(),
            "welcome" => "Welcome, {$this->name}!"
        ]);
    }
}

$student1=new Student("Seham Mohsen","sehammohsne@gmail.com","21");
$student1->activate();
echo $student1->toJson();
