// arrow function

let add = (a, b) => {
  return a + b;
};
console.log(add(5, 10));
let add2 = (a, b) => a + b;
let two = (n) => n * 2;
let hello = () => "Hello, World";
let hello2 = (_) => "Hello, World";

// console.log(add3(1, 2));         // Error: add3 is not defined
var add3 = function (a, b) {
  return a + b;
};

// array || Standard Object Constructor =>Array()
let mix = new Array("aung", 12, true, {}, [{}, []], null, undefined, "", NaN);
mix.forEach((i) => console.log(typeof i));

let mix2 = [
  [123, 456, 789],
  ["Ant", "Cat", "Dog"],
];
console.log(mix2[0][1]);

for (let val of mix2) {
  for (let val2 of val) {
    console.log(val2);
    if (val2 == "Ant") {
      break;
    }
  }
}

// Array Methods

let fruits = ["Apple", "Orange", "Mango", "Banana"];
console.log(fruits);
console.log(fruits.splice(fruits.indexOf("Banana"), 1)); //return => res && change the original array
console.log(fruits);

let fruits2 = ["Apple", "Orange", "Mango"];
let result = fruits.join(","); // array => string
console.log(result); // result → Apple,Orange,Mango as a string type

let nums = [10, 20, 30, 40, 50, 60, 70];
nums.forEach((n) => console.log(n));
console.log(nums.map((n) => n * 10));
console.log(nums.filter((n) => n > 30));
console.log(nums.every((n) => n == 30));
console.log(nums.some((n) => n == 30));
console.log(nums.reduce((a, n) => a + n));

let nums2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let result2 = nums2.map((n) => n + 2).filter((n) => n % 2);
console.log(result2);

let myDouble = 69.123456789;
console.log(myDouble.toFixed(5));

// js string like an object
let name = "Bob";
let greet = `Hello ${name}`;
let welcome = new String("Welcome");

console.log(name[0]); // B
console.log("hello".charAt(4)); // o
console.log(welcome.length); // 7
console.log(greet.substring(0, 5)); // hello
console.log(welcome.split("")); // srting to array

//
String.prototype.test = () => {
  console.log("this is testing");
};
"abcd".test();

// object
let cat = {};

let person = { name: "Alice", age: 21 };
let jsonPerson = JSON.stringify(person); // obj -> json string
console.log(JSON.parse(jsonPerson)); // json string -> obj
console.log(JSON);

console.log(new Date());

// globaltthis
function canMakeHTTPRequest() {
  return typeof globalThis.XMLHttpRequest === "function";
}
console.log(canMakeHTTPRequest());
console.log(globalThis);
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects

// control flow
let nums3 = [1, 12, 5, 4, 9, 5];
let result3 = nums.map(function (n) {
  if (n === 5) n += 10;
  return n; // result → [ 1, 12, 15, 4, 9, 15 ]
});

let people = [
  { name: "Alex" },
  { name: "Bob", gender: "M" },
  { name: "Tom", gender: "m" },
  { name: "Mary", gender: "F" },
  { name: "lucy", gender: "f" },
];

let res = people.map((p) => {
  if (p.gender) {
    if (p.gender == "M" || p.gender == "m") {
      p.gender = "male";
    } else if (p.gender == "f" || p.gender == "F") {
      p.gender = "female";
    }
  } else {
    p.gender = "unknown";
  }
  return p;
});
console.log(res);

let user = { name: "Bob", age: 17 }
let status = user.age >= 18 ? "Authorized" : "Unauthorized"
console.log(status);
