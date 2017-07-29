<?php
$start = $_POST["start"];
$end = $_POST["end"];
$startclean = str_replace(" ", "+", $start);
$endclean = str_replace(" ", "+", $end);
//Driving
$driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $driving_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$driving_geo = json_decode(curl_exec($ch), true);

$driving_dist = $driving_geo['rows'][0]['elements'][0]['distance']['text'];
$driving_time = $driving_geo['rows'][0]['elements'][0]['duration']['text'];

//Cycling
$cycling_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=bicycling&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $cycling_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$cycling_geo = json_decode(curl_exec($ch), true);

$cycling_dist = $cycling_geo['rows'][0]['elements'][0]['distance']['text'];
$cycling_time = $cycling_geo['rows'][0]['elements'][0]['duration']['text'];

//Walking
$walking_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=walking&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $walking_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$walking_geo = json_decode(curl_exec($ch), true);

$walking_dist = $walking_geo['rows'][0]['elements'][0]['distance']['text'];
$walking_time = $walking_geo['rows'][0]['elements'][0]['duration']['text'];

//Bus
$bus_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=transit&transit_mode=bus&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bus_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$bus_geo = json_decode(curl_exec($ch), true);

$bus_dist = $bus_geo['rows'][0]['elements'][0]['distance']['text'];
$bus_time = $bus_geo['rows'][0]['elements'][0]['duration']['text'];

//Train
$train_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=transit&transit_mode=train&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $train_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$train_geo = json_decode(curl_exec($ch), true);

$train_dist = $train_geo['rows'][0]['elements'][0]['distance']['text'];
$train_time = $train_geo['rows'][0]['elements'][0]['duration']['text'];

echo 'The distance for driving is <b>'.$driving_dist.'</b> and the time for driving is <b>'.$driving_time.'</b>.<br><br>';

echo 'The distance for cycling is <b>'.$cycling_dist.'</b> and the time for cycling is <b>'.$cycling_time.'</b>.<br><br>';

echo 'The distance for walking is <b>'.$walking_dist.'</b> and the time for walking is <b>'.$walking_time.'</b>.<br><br>';

echo 'The distance for bus is <b>'.$bus_dist.'</b> and the time for bus is <b>'.$bus_time.'</b>.<br><br>';

echo 'The distance for train is <b>'.$train_dist.'</b> and the time for train is <b>'.$train_time.'</b>.';

?>
