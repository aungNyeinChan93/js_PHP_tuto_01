<?php


// class Lamp {
//     public function turnOn() {
//         echo "Lamp is on";
//     }
// }

// class Button {
//     private $lamp;

//     public function __construct(Lamp $lamp) {
//         $this->lamp = $lamp;
//     }

//     public function press() {
//         $this->lamp->turnOn();
//     }
// }

// $lamp = new Lamp();
// $button = new Button($lamp);
// $button->press(); // Outputs: Lamp is on



interface Switchable
{
    public function turnOn();
}

class Lamp implements Switchable
{
    public function turnOn()
    {
        echo "Lamp is on <br>";
    }
}
class Phone implements Switchable {
    public function turnOn()
    {
        echo "Phone is on <br>";
    }
}
class Book{

}

class Button
{
    public function __construct(private Switchable $device)
    {

    }

    public function press()
    {
        $this->device->turnOn();
    }
}

$lamp = new Lamp();
$button = new Button($lamp);
$button->press();           // Outputs: Lamp is on
$button1 = new Button(new Phone);   
$button1->press();
// $button2 = new Button(new Book);   //Expected type "Switchable" found "Book" 




// interface Switchable {
//     public function turnOn();
// }

// class Lamp implements Switchable {
//     public function turnOn() {
//         echo "Lamp is on";
//     }
// }

// class Button {
//     private $device;

//     public function __construct(Switchable $device) {
//         $this->device = $device;
//     }

//     public function press() {
//         $this->device->turnOn();
//     }
// }

// $lamp = new Lamp();
// $button = new Button($lamp);
// $button->press(); // Outputs: Lamp is on


