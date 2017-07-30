<?php
$start = $_GET["start"];
$end = $_GET["end"];
$startclean = str_replace(" ", "+", $start);
$endclean = str_replace(" ", "+", $end);
//Driving
$driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $driving_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$driving_geo = json_decode(curl_exec($ch), true);

$driving_dist = $driving_geo['rows'][0]['elements'][0]['distance']['value'];
$driving_time = $driving_geo['rows'][0]['elements'][0]['duration']['value'];

//Cycling
$cycling_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=bicycling&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $cycling_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$cycling_geo = json_decode(curl_exec($ch), true);

$cycling_dist = $cycling_geo['rows'][0]['elements'][0]['distance']['value'];
$cycling_time = $cycling_geo['rows'][0]['elements'][0]['duration']['value'];

//Walking
$walking_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=walking&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $walking_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$walking_geo = json_decode(curl_exec($ch), true);

$walking_dist = $walking_geo['rows'][0]['elements'][0]['distance']['value'];
$walking_time = $walking_geo['rows'][0]['elements'][0]['duration']['value'];

//Bus
$bus_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=transit&transit_mode=bus&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bus_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$bus_geo = json_decode(curl_exec($ch), true);

$bus_dist = $bus_geo['rows'][0]['elements'][0]['distance']['value'];
$bus_time = $bus_geo['rows'][0]['elements'][0]['duration']['value'];

//Train
$train_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&mode=transit&transit_mode=train&origins=".$startclean."&destinations=".$endclean."&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $train_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$train_geo = json_decode(curl_exec($ch), true);

$train_dist = $train_geo['rows'][0]['elements'][0]['distance']['value'];
$train_time = $train_geo['rows'][0]['elements'][0]['duration']['value'];

$post_data = json_encode(array('driving_dist' => $driving_dist, 'cycling_dist' => $cycling_dist, 'walking_dist' => $walking_dist, 'bus_dist' => $bus_dist, 'train_dist' => $train_dist, 'driving_time' => $driving_time, 'cycling_time' => $cycling_time, 'walking_time' => $walking_time, 'bus_time' => $bus_time, 'train_time' => $train_time));

echo $post_data;

?>
