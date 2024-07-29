console.log("hello world");
const myArr = new Array();
myArr[0] = "thaw";
console.log(myArr);

let customers = ["aung", "nyein", "chan", "phyoe"];
const [one, two, three] = customers;
console.log(one, two);

const myObj = {
  name: "chan",
  age: 20,
  address: "ygn",
};

const { name, age, address } = myObj;
console.log(name, age);

let persons = [
  { name: "aung", email: "aung@gmail.com", gender: "male", age: 30 },
  { name: "kyaw", email: "kyaw@gmail.com", gender: "male", age: 20 },
  { name: "mgmg", email: "mgmg@gmail.com", gender: "male", age: 18 },
  { name: "hlahla", email: "hlahla@gmail.com", gender: "female", age: 10 },
  { name: "susu", email: "susu@gmail.com", gender: "female", age: 18 },
  { name: "nyein", email: "nyein@gmail.com", gender: "female", age: 25 },
];

for (let i = 0; i < persons.length; i++) {
  let customerData = persons[i];
  if (customerData.age < 25) {
    console.log("skip");
    continue;
  } else {
    console.log(
      `Make-up promotion discount event mail sending to ${customerData.email}`
    );
  }
}

const newArray = [...myArr, ...customers];
console.log(newArray);
console.log(myArr.concat(customers));

function test(...rest) {
  rest.forEach((r) => console.log(r));
}
test(1, 121, 46, 56, 1, 22, 1, 2, 12, 1, 122);

let num = [10, 20, 30, 40, 50, 60];
let res = num.map((n) => n * 10);
console.log(res);

let string = "aung nyein chan";
console.log(string.substring(0, 4));

let float = 0.2356498;
console.log(float.toFixed(4));

let date = "10/10/1993";
console.log(date.split("/"));

let obj1 = {
  name: "mgmg",
  age: 17,
  gender: "male",
};

let obj2 = {
  1: "hlahal",
  2: 20,
  3: "female",
};

let combineObj = { ...obj1, ...obj2 };
console.log(combineObj);

// array method
let nums = [1,2,3,4,5,6,7,"test",9]
let find = nums.find((n)=>n == "test");
console.log(find);                        // "test"

let trim = "    hello world    "
console.log(trim.trim());
console.log(trim.includes("o"));          // true

// join()
console.log(nums.join("/"));              // -> 1/2/3/4/5/6/7/test/9 || array to string

// split()
const time =new Date;
console.log(time.toString().split(":")); // -> [ 'Tue Jul 09 2024 14', '54', '55 GMT+0630 (Myanmar Time)' ] || string to array  

// splice()
var fruits = ["Banana", "Orange", "Apple", "Mango"];
console.log(fruits.splice(2,2));  // -> splice is unpure function ||output -> [ 'Apple', 'Mango' ]
console.log(fruits);              // -> [ 'Banana', 'Orange' ]
console.log(fruits.splice(1,0,"waterMelon","pineapple")); //[]
console.log(fruits);              // -> [ 'Banana', 'waterMelon', 'pineapple', 'Orange' ]

// slice()
let car = ["toyota","bmw","succes","probox","Volvo"]
console.log(car.slice(2,4));      // slice is pure function (index,length) || output -> [ 'success', 'probox' ]
console.log(car);                 // -> [ 'toyota', 'bmw', 'succes', 'probox', 'Volvo' ]

// string to number type
let myString = "10";
console.log(Number(myString));
console.log(myString*1);


// toString() && parseInt()
let ronaldo = 7;
console.log(typeof ronaldo.toString());

let fav_soccerClub = "Man_U"
console.log(typeof parseInt(fav_soccerClub));     // type -> number || output -> NaN



