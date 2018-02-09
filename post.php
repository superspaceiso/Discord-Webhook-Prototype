<?php

$message = $_POST['message'];
$avatar = 'https://pbs.twimg.com/profile_images/582300237932433408/Usv_0EQw_400x400.jpg';

$arr = array('content' => $message, 'avatar_url' => $avatar);

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

header("location: index.php");
exit;

?>
