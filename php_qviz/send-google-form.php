<?php
// подключаем Bootstrap
require __DIR__.'/vendor/autoload.php';

// работа с данным скриптом показана в видео на сайте https://www.youtube.com/watch?v=5iUL25PJXLk&list=PLYth-43zk_0LBU66hTAVoKnr5HUOODZUJ
// формируем запись в таблицу google (изменить)
$url = "https://docs.google.com/forms/u/0/d/e/1FAIpQLScxTRYcx3cdp1rCFDtDQ7A8-Mp1O_17iRTFgdakropys15-_A/formResponse";
// сохраняем url, с которого была отправлена форма в переменную utm
//$utm = $_SERVER["HTTP_REFERER"];
// ссылка для переадресации (изменить)

// массив данных (изменить entry, draft и fbzx)
$post_data = array (
 "entry.1609785284" => $_POST['phone'],
 "entry.926169553" => $_POST['material'],
 "entry.366350680" => $_POST['where'],
 "entry.442363607" => $_POST['volume'],
 "entry.1791910523" => $_POST['city'],
 "entry.1898091318" => $_POST['sale'], 
 "entry.2061021405" => $_POST['utm'],
 "draftResponse" => "[null,null,&quot;-2645638430624963246&quot;]",
 "pageHistory" => "0",
 "fbzx" => "-2645638430624963246"
);

// Далее не трогать
// с помощью CURL заносим данные в таблицу google
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// указываем, что у нас POST запрос
curl_setopt($ch, CURLOPT_POST, 1);
// добавляем переменные
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//заполняем таблицу google
$output = curl_exec($ch);
curl_close($ch);

?>