<?php

$message = $_POST['message'];

$arr = array('content' => $message);

$json = json_encode($arr);

$url = 'https://discordapp.com/api/webhooks/274628909138575360/Im39Wt9hslEtdGwu_lMt3tUI39DeCmNhvlrnXeGM3v_nAnfUUSKzrMd32nt-JBmhqP5d';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json))
);

curl_exec($ch);
curl_close($ch);

?>
