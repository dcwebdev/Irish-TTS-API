<?php
/**
 * Created by PhpStorm.
 * User: Laura 7
 * Date: 11/19/2016
 * Time: 8:20 PM
 */
$string = $_GET['s'];
$lang = $_GET['lang'] ?? "ga";
$url = "http://67.207.83.164/IrishTTSAPI/api.php?s={$string}&lang={$lang}";

$curl = curl_init(); //url can also be given as a param here
curl_setopt($curl,CURLOPT_URL,$url);  //needs an absolute url
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); //request returns false if error or a result if successful
$result = curl_exec($curl);

header("Content-Type: audio/wav");
var_dump($result);
curl_close($curl);
?>