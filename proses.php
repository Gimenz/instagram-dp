<?php
error_reporting(1);
if(!isset($_GET['username']) || $_POST['uname'] == "")
$html = file_get_contents('https://instagram.com/'.$_POST['uname']);{
//Get user ID
$subData = substr($html, strpos($html, 'window._sharedData'), strpos($html, '};'));
$userID = strstr($subData, '"id":"');
$userID = str_replace('"id":"', '', $userID);
$userID = strstr($userID, '"', true);
//Download user info
$jsonData = file_get_contents('https://i.instagram.com/api/v1/users/'.$userID.'/info/');{
$decodedInfo = json_decode($jsonData);
$username = $decodedInfo->user->username;
$foto = $decodedInfo->user->hd_profile_pic_url_info->url;
$userh = 'https://instagram.com/'.$decodedInfo->user->username;
}
//Print info
if($html){
echo '<b>Username:</b> <a href="'.$userh.'" class="card-title">@'.$username.'</a><br><br>';
echo '<img class="gambar" src="'.$foto.'" width="300" height="300" alt="foto profil"/><br><br>';
echo '<a href="'.$foto.'" download="'.$foto.'" class="btn btn-info"><h5>Download</h5></a><br>';
die();}else{
echo "The username you entered is incorrect or not found.";
}}
?>