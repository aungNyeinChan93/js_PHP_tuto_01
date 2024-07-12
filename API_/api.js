let api_link = "https://fakestoreapi.com/products";


try {
    fetch(api_link).then(res=> res.json()).then(data=> console.log(data.map(d=>d.title)));
} catch (error) {
    console.log(error);
}


