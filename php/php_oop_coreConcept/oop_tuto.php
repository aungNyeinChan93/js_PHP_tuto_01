<?php

abstract class Villains{
    public function __construct(public $name , private $origin ){
        $this->name = $name;
        $this->origin = $origin;
    }
    public function Bully(){
        echo "<h4>He have been bully </h4>";
    }
    
    public function get_origin (){
        echo $this->origin;
    }
};

abstract class Heros{
    public function __construct(public $name , private $origin ){
        $this->name = $name;
        $this->origin = $origin;
    }
    public function Save(){
        echo "<h4>$this->name have been saved from bad_guy! </h4>";
    }
    
    public function get_origin (){
        echo $this->origin;
    }
};

interface Abalities {
    public function Physical_attacks() ;
    public function Magic_attack();
    public function special_att();
}

class Doctor_dom extends Villains implements Abalities {
    public function Physical_attacks(){
        echo " <br>Attack with Energy manipulation <br>"; 
    }
    public function Magic_attack(){
        echo " <br>Attack with Magical powers <br>";
    }
    public function special_att(){
        echo " <br>Use Ulti <br>";
    }
};
echo "<pre>";
$doctor_dom = new Doctor_dom("Doctor Doom ","Wizard");
echo $doctor_dom->name;
$doctor_dom->Physical_attacks();
$doctor_dom->get_origin();
// $doctor_dom->origin;      // Undefined property: Doctor_dom::$origin 


// encapsulation in oop
class Oop_tuto{
    static $about = "OOP";
    // public function encapsulation(){
    //     class __Public{                     //  Class declarations may not be nested in 
    //         public function public__(){
    //             echo "<p>
    //                 Encapsulation can be used if the properties of the object are private and updating them through public methods.
    //                 Encapsulation in PHP can be achieved using the implementation of access specifiers.
    //                 It is very careful about OOPs concept of inheritance as many times inheritance can undermine the concept of encapsulation.
    //                 Inheritance exposes some details of a parent class, effectively breaking encapsulation.
    //             </p>";
    //         }
    //     }
    //     $public = new __Public();
    //     return $public;


    // }
}

echo "<br>". Oop_tuto::$about;
// $Oop = new Oop_tuto();
// $Oop->encapsulation()->public__();           // Class declarations may not be nested in 
