<?php
$forecastKey = "eRzOUAGG87J6ainXjANtAYpp7OuK9aXr";

if(isset($_GET['city'])){
    $city = urlencode($_GET['city']);
    $url = "http://dataservice.accuweather.com/locations/v1/cities/search?apikey=".$forecastKey."&q=".$city."&language=it-it";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);
    curl_close($curl);
    echo $res;
    exit;
}


if(isset($_GET['key'])){
    $cityKey = $_GET['key'];
    $url = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/".$cityKey.'?apikey='.$forecastKey.'&language=it-it';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);
    curl_close($curl);
    echo $res;
    exit;
}
