class Test {}
console.log(typeof Test); // -> function || template of object || obj

class Car {
  color = "Red";
  wheels = 4;
  drive() {
    console.log("This " + this.color + " car is driving");
  }
}

const newCar = new Car();
console.log(newCar.wheels);
newCar.drive();

// Access-Control Modifier (Public ,Private/Encapsulation ,Protected/extends ,Static);
class Calculator {
  static PI = 3.14;
  static add(a, b) {
    return a + b;
  }
  #test = "test";
  call_private() {
    console.log(this.#test);
  }
  _test2 = "protected method";
}
console.log(Calculator.PI);
console.log(Calculator.add(10, 20));
let newCal = new Calculator(); 
// console.log(newCal.#test);           // undefined
newCal.call_private();
console.log(newCal._test2);
console.log(newCal);


class Animal {
    constructor(a,b){
        this.name = a;
        this.age = b
    };
    jump(){
        console.log(`${this.name} is jumping!`);
    }
    _test = "protected method from Animal Calss"
};
const dog = new Animal("bobo",10);
dog.jump();
console.log(dog._test);

class Cat extends Animal{

};
const puccy = new Cat ("shwewar",3);
puccy.jump();

class bird extends Animal{
    constructor(a,b,c){
        super(a,b);
        this.flayAble = c
    };
    fly(){
        return this.name +" can fly -> "+this.flayAble;
    };
    
};
const bird_one  = new bird("zzz",12,true);
const chicken  = new bird("Rrr",12,false);
console.log(bird_one.fly());
console.log(chicken.fly());

/*
Protected ရဲ့ သဘောသဘာဝ Inheritance လုပ်ပြီးဆက်ခံ
လိုက်တဲ့အင်္ဂခါ ဆက်ခံတဲ့ Class ရရှိမှာက Public Property နဲ့ Method တွေကိုသာ ရရှိမှာ ဖြLစ်တယ်>>>not working in js
*/
console.log(chicken._test);