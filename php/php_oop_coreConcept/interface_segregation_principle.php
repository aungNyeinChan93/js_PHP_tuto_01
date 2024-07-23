<?php

interface OrderTakerInterface
{
    public function takeOrder();
}

interface CookInterface
{
    public function cookFood();
}

interface DishwasherInterface
{
    public function washDishes();
}

class Waiter implements OrderTakerInterface
{
    public function takeOrder()
    {
        echo "Taking order";
    }
}

class Chef implements CookInterface
{
    public function cookFood()
    {
        echo "Cooking food";
    }
}

class Dishwasher implements DishwasherInterface
{
    public function washDishes()
    {
        echo "Washing dishes";
    }
}

$waiter = new Waiter();
$waiter->takeOrder(); // Works fine

$chef = new Chef();
$chef->cookFood(); // Works fine

$dishwasher = new Dishwasher();
$dishwasher->washDishes(); // Works fine


// ----------------------------------------------------------

interface Workable {
    public function work():void;
};

interface Eatable {
    public function eat():void;
};

class HumanWorker implements Workable,Eatable {
    public function work():void{
        echo "working <br>";
    }
    public function eat():void{
        echo "eating <br>";
    }
};

class RobotWorker implements Workable{
    public function work():void{
        echo "working <br>";
    }
};

$humanWorker = new HumanWorker();
$humanWorker->work();
$humanWorker->eat();

$robot = new RobotWorker();
$robot->work();