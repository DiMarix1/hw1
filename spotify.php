<?php
 $appId = "5263fc2a7e644de1b98d43e7df43ce13";
 $appSecret = "1ad470fcbc7f4a9b8c3bbfb9a9111b12";

 header('Content-Type: application/json');

 $linkToken  ="https://accounts.spotify.com/api/token";

//  global $token;

 if(isset($_GET['q'])){
    
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
 curl_setopt($curl,CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($appId.':'.$appSecret)));
 $res = curl_exec($curl);
 curl_close($curl);
 

 $token = json_decode($res,true);
 
$scelta =urldecode($_GET['q']); 
// echo $scelta;

    switch($scelta){
        case 1:
            $paese ="37i9dQZEVXbMXbN3EUUhlg";
            break;
        case 2:
            $paese = "37i9dQZEVXbLxoIml4MYkT";
            break;
        case 3:
            $paese = "37i9dQZEVXbLdGSmz6xilI";
            break;
        case 4:
            $paese = "37i9dQZEVXbOa2lmxNORXQ";
            break;
    }
//  echo $paese;
$linkPlaylist = "https://api.spotify.com/v1/playlists/".$paese;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $linkPlaylist);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
$res = curl_exec($curl);
curl_close($curl);
// echo json_encode($res,true);
echo $res;
}
