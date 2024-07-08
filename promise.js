// Promises & async, await

function add1000() {
  let result = 0;
  for (let i = 1; i <= 1000; i++) {
    result += i;
  }
  return result;
}
console.log("1111111111");
console.log(add1000());
console.log("22222222222");

// async code
function add100Later() {
  return new Promise((resolve, reject) => {
    if (resolve) {
      resolve(add1000());
    } else {
      reject("fail");
    }
  });
}
console.log("3333333333");
add100Later()
  .then((res) => console.log(res))
  .catch((rej) => console.log(rej));
console.log("4444444444");


// async, await
let res = async function() {
  let result = await add1000();
  console.log((result));
}
console.log("55555555");
res();
console.log("66666666");
