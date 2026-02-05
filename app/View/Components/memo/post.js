//JSでPOST送信する例です（Node.jsで実行）

const num = 111;

fetch(`https://jsonplaceholder.typicode.com/posts/${num}`,
    {
        method: 'POST',
        headers: {'Content-type': 'application/json; charset=UTF-8'},
        body: JSON.stringify({title: 'post'}),
    })
    .then((response) => response.json())
    .then((json) => {
        console.log(JSON.stringify(json, null, 2));
    });