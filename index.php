<?php

// unsc4ryx

// chatGPT
function piwpiw($keyword) {
$authToken = ""; // OpenAi API ex: sk-Xf2VXXX
    $postData = array(
	"model" => "text-davinci-003", // set engine
	"prompt" => $keyword,
     "temperature" => 0.3,
    "max_tokens" => 3000,
     "top_p" => 1.0,
     "frequency_penalty" => 0.0,
     "presence_penalty" => 0.0
    );
    $ch = curl_init('https://api.openai.com/v1/completions');
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $authToken,
            'Content-Type: application/json'
        ) ,
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    $response = curl_exec($ch);
    $responseData = json_decode($response, true);
    return $responseData;
}
// blog
function crot($judul, $peler, $bawang) {
$blogID = '';  // blog id ex: 6249XXX
$authToken = ''; // token ex: ya29.a0AXXXXX
    $postData = array(
        'kind' => 'blogger#post',
        'blog' => array(
            'id' => $blogID
        ) ,
        'title' => $judul,
        'labels' => [$bawang],
        'content' => $peler
    );
    $ch = curl_init('https://www.googleapis.com/blogger/v3/blogs/' . $blogID . '/posts/');
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $authToken,
            'Content-Type: application/json'
        ) ,
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    $response = curl_exec($ch);
    $responseData = json_decode($response, true);
    return $responseData;
}

$k = $_GET['y'];
$labelkiw ="Artikel baru";

$peju = piwpiw($k);
$kering = $peju['choices'][0]['text'];

// if kering = ok {
$iyah = crot($k, $kering, $labelkiw);
// } else { errorrororor }

// run? localhost:6666/index.php?y=judulnya
?>
 
