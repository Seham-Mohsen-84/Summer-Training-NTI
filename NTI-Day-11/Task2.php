<?php
class Employee{
    public $name = 'jack';
    protected $salary = '10000';
    private $bonus = '5000';

    public function fullinfo(){
        echo "Full Info"."<br>";
        echo"Name: ".$this->name."<br>";
        echo"Salary: ".$this->salary."<br>";
        echo"Bonus: ".$this->bonus."<br>";
    }

}

$engine = new Employee();
echo $engine->fullinfo();