<?php

$username = null;
$message = $_POST['message'];
$avatar = null;

//Embeds
$authorname = 'Test Author';
$url = null;
$icon_url = null;
$title = null;
$description = 'This is a test';
$color = 8388863;
$thumbnail_url = null;
$image_url = null;
$field_name = 'Test Field';
$field_value = 'BOOP';
$field_inline = 'true';
$footer_text = 'Test Footer';
$footer_icon_url = null;

$message = [
  'content' => $message,
  'username' => $username,
  'avatar_url' => $avatar,
  'embeds' => [[
      'author' => [
        'name' => $authorname,
        'url' => $url,
        'icon_url' => $icon_url,
      ],
  'title' => $title,
  'description' => $description,
  'color' => $color,
      'fields' => [[
        'name' => $field_name,
        'value' => $field_value,
        'inline' => $field_inline,
      ],
      [
      'name' => $field_name,
      'value' => $field_value,
      'inline' => $field_inline,
    ],
    ],
      'thumbnail' => [
        'url' => $thumbnail_url,
      ],
      'image' => [
        'url' => $image_url,
      ],
      'footer' => [
        'text' => $footer_text,
        'icon_url' => $footer_icon_url
      ]
  ]]
];

$encoded_message = json_encode($message, JSON_PRETTY_PRINT);

//var_dump($encoded_message);

$webhook_url = 'https://discordapp.com/api/webhooks/274628909138575360/Im39Wt9hslEtdGwu_lMt3tUI39DeCmNhvlrnXeGM3v_nAnfUUSKzrMd32nt-JBmhqP5d';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $webhook_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($encoded_message))
);

curl_exec($ch);
curl_close($ch);

header("location: index.php");
exit;

?>
