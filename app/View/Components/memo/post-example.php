<?php
// PHP単体実行でデータを取得して表示する例です

$id = 90;
$url = "https://jsonplaceholder.typicode.com/posts/{$id}";

$json = file_get_contents($url);

//if文はエラー処理
if ($json === false) {
	fwrite(STDERR, "Failed to fetch data\n");
	exit(1);
}

$data = json_decode($json, true);

//if文はエラー処理
if (!is_array($data)) {
	fwrite(STDERR, "Failed to decode JSON\n");
	exit(1);
}

echo "[id] {$data['id']}\n";
echo "[title] {$data['title']}\n";
echo "[content]{$data['body']}\n";