<?php

//文字列の置換
$pattern = '/<にゃんにゃん>(.*)<\/にゃーん>/i';
$replace = '<a href = "http://$1">$1</a>';
$content = '<p><にゃんにゃん>google.com</にゃーん>へのリンクです。</p>';
var_dump(preg_replace($pattern, $replace ,$content));

//よくあるトークン発行方法
$toke_byte = openssl_random_pseudo_bytes(64);
$csrf_token = bin2hex($toke_byte);

echo $csrf_token."\n";

// バリデーション
$email_sample = 'joe@example.com'; //フォームから取ってきた値

//filter_varは戻り値が非対称です！！！
$filtered_mail=filter_var($email_sample, FILTER_VALIDATE_EMAIL);
var_dump($filtered_mail);

if($filtered_mail === false){
    echo"ぐえええええwwwwwwwwwwwwwww";
}else{
    echo"なんや、emailかいな";
}