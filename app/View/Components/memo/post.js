const num =22;

fetch("https://jsonplaceholder.typicode.com/posts/"+num, 
    {
        method: 'POST', 
        headers: {'Content-type': 'application/json; charset=UTF-8',},
        body: JSON.stringify({title: 'posr'}),  
    })
    .then((response) => response.json())
    .then((json) => console.log(json));