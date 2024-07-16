class Animal {
    static type = new Array("mammals","birds","fish","reptiles","amphibians");
    constructor(name,age){
        this.name = name;
        this.age = age
    };
    info(){
        console.log(`this dog name is ${this.name} and ${this.age} years old`);
    };

};
class Mammals extends Animal{
    static type(){
        console.log(Animal.type[0]);            //in php static::type[0];
    }
    bark(){
        return this.name +" -> wok wok!"
    }

};

class Fish extends Animal{
    static type(){
        console.log(Animal.type[2]);
    }
    constructor(name,age,swim = true){
        super(name,age);
        this.ableToswimming = swim;
    };
    swim(){
        console.log(this.name +" is swimming...");
    }
}

const dog = new Mammals("me Lone",8);
dog.info();
console.log(dog.bark());
console.log(Animal.type[0]);
Mammals.type();

const fish = new Fish("Nemo",2);
console.log(fish);
fish.swim();
console.log(fish.ableToswimming);
Fish.type();