<?php
/**
 * Created by PhpStorm.
 * User: Laura 7
 * Date: 11/19/2016
 * Time: 8:20 PM
 */

$curl = curl_init(); //url can also be given as a param here
curl_setopt($curl,CURLOPT_URL,"127.0.0.1/irishttsapi/api/php?s=leabhair&lang=ga");  //needs an absolute url
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); //request returns false if error or a result if successful
$result = curl_exec($curl);
curl_close($curl);
?>