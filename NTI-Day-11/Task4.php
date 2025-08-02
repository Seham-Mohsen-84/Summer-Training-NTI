<?php
//inheritance
class vehicle{
    public $model;
    public $make;
    public function __construct(string $model, string $make){
        $this->model = $model;
        $this->make = $make;
    }
    public function info(){
        echo "Info"."<br>";
        echo "model:".$this->model;
        echo "<br>";
        echo "make:".$this->make;
        echo "<br>";
    }

}

class car extends vehicle{
    public $fueltype;
    public function __construct(string $model, string $make, string $fueltype){
        $this->model = $model;
        $this->make = $make;
        $this->fueltype = $fueltype;
    }
    public function info(){
        echo "Vehicle Info:"."<br>";
        echo "<hr>";
        echo "model:".$this->model;
        echo "<br>";
        echo "make:".$this->make;
        echo "<br>";
        echo "fueltype:".$this->fueltype;
        echo "<br>";
    }
}

//encapsulation
class backaccount{
    private $balance;
    public function __construct(int $balance){
        $this->balance = $balance;
    }
    public function balance(){
        echo "Balance is ".$this->balance;
        echo "<br>";
    }

    public function withdraw($amount){
        $withdraw =$this->balance - $amount;
        echo "Withdraw ".$amount." and your balance is ".$withdraw;;
        echo "<br>";
    }

    public function deposit($amount){
        $deposit=$this->balance+$amount;
        echo "Withdraw ".$amount." and your balance is ".$deposit;;
        echo "<br>";
    }
}

$car= new Car("bmw","germany","90");
echo "<hr>";
$car->info();
echo "<hr>";
echo "Back Account Info: "."<br>";
echo "<hr>";
$bank=new backaccount("40000");
$bank->balance();
$bank->deposit(1000);
$bank->withdraw(1000);


//abstraction
abstract class employee1{
    public $salaryberhour;
    public function __construct(int $salary){
        $this->salaryberhour = $salary;
    }
    abstract function calculateSalary();
}

class HourlyEmployee extends employee1{
    public $hours;
    public function calculateSalary(){
        return $this->salaryberhour * $this->hours;
    }
}

echo "<hr>";
echo "Hourly Employee Info: "."<br>";
echo "<hr>";
$employee1 = new hourlyEmployee("400");
$employee1->hours =12;
$salary = $employee1->calculateSalary();
echo "Full salary: ".$salary;
echo "<br>";

//polymorphism
class shape{
    public function area(){

    }
}

class Rectangle extends shape {
    public $x ;
    public $y;
    public function area(){
        return $this->x * $this->y ;
    }
}

class circle extends shape {
    public $radius ;
    public function area(){
        return 3.14 * $this->radius **2;
    }
}

echo "<hr>";
echo "Rectangle Info: "."<br>";
echo "<hr>";

$rectangle=new Rectangle();
$rectangle->x=6;
$rectangle->y=8;
$area= $rectangle->area();
echo $area;

echo "<hr>";
echo "Circle Info: "."<br>";
echo "<hr>";

$Circle=new Circle();
$Circle->radius=5;
$area= $Circle->area();

echo $area;