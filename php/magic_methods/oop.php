<?php

class Test
{
    public function __call($method, $args)
    {
        echo $method . " is not exits <br>";
    }
    static function __callStatic($method, $args)
    {
        echo "static " . $method . " is not exits <br>";

    }

}

$new1 = new Test();
$new1->add();
Test::add();

// invoke()
class Helloworld
{
    public function __invoke()
    {
        echo "Hello World! <br>";
    }
}
;

$hw1 = new Helloworld();
$hw1();

class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass();
$obj(true); // This will call the __invoke method

class Comparator
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke($a, $b)
    {
        return $a[$this->key] <=> $b[$this->key];
    }
}
$customers = [
    ['id' => 1, 'name' => 'John', 'credit' => 20000],
    ['id' => 3, 'name' => 'Alice', 'credit' => 10000],
    ['id' => 2, 'name' => 'Bob', 'credit' => 15000]
];
print "<pre>";
usort($customers, new Comparator('name'));
// var_dump($customers);

// __toString()
class Pi
{
    private $pi = 3.14;
    public function __tostring()
    {
        return "this PI value is $this->pi <br>";
    }
}
$string = new Pi();
echo $string;
echo gettype($string);


// encupsulation 
class User
{
    private $name;
    private $email;

    // Getter for name
    public function getName()
    {
        return $this->name;
    }

    // Setter for name
    public function setName($name)
    {
        $this->name = $name;
    }

    // Getter for email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter for email
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception("Invalid email format");
        }
    }
}

$user = new User();
$user->setName("John Doe");
$user->setEmail("john.doe@example.com");

echo $user->getName();  // Outputs: John Doe
echo $user->getEmail(); // Outputs: john.doe@example.com


// polymorphism
abstract class Person
{
    abstract public function greet();
}

class English extends Person
{
    public function greet()
    {
        return "Hello!";
    }
}

class German extends Person
{
    public function greet()
    {
        return "Hallo!";
    }
}

class French extends Person
{
    public function greet()
    {
        return "Bonjour!";
    }
}

function greeting(array $people)
{
    foreach ($people as $person) {
        echo $person->greet() . "<br>";
    }
}

$people = [new English(), new German(), new French()];
greeting($people);

interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        return "Drawing circle.";
    }
}

class Square implements Shape {
    public function draw() {
        return "Drawing square.";
    }
}

function drawShapes(array $shapes) {
    foreach ($shapes as $shape) {
        echo $shape->draw() . "<br>";
    }
}

$shapes = [new Circle(), new Square()];
drawShapes($shapes);
