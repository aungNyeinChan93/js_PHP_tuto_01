<?php

// LSP -> liskov substituation principle

interface Flyable{
    public function fly();
}
class Bird
{
    // public function fly()
    // {
    //     echo "Flying";
    // }
}

class Sparrow extends Bird implements Flyable
{
    // Inherits the fly method from Bird
    public function fly(){
        echo " Sparrows are flying <br>";
    }
}

class Ostrich extends Bird 
{
    // Ostriches can't fly, so this violates LSP
    // public function fly()
    // {
    //     throw new Exception("Ostriches can't fly");
    // }
}

function makeBirdFly(Flyable $bird)
{
    $bird->fly();
}

$bird = new Sparrow();
makeBirdFly($bird); // Outputs: Flying

$bird = new Ostrich();
// makeBirdFly($bird); // Throws Exception: Ostriches can't fly

