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
$email_sample = 'joe@example.com';

$filtered_mail=filter_var($email_sample, FILTER_VALIDATE_EMAIL);
$filterd_email_bool=isset($filtered_mail);

if($filterd_email_bool === true){
    echo"これはメールアドレスやで";
}