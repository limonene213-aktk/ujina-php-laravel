// Node.js単体実行でデータを取得して表示する例です

const id = 90;

fetch(`https://jsonplaceholder.typicode.com/posts/${id}`)
    .then((response) => response.json())
    .then((json) => {
        console.log(`[id] ${json.id}`);
        console.log(`[title] ${json.title}`);
        console.log(`[content]${json.body}`);
    });