<?php
require 'db.php';

//if You have a API and APIKEY use this code 

$apiKey = 'YOUR_API_KEY'; // Replace with your OpenWeather API key
$city = 'London'; // Default city
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

//else  use this one for testing

//$city = 'London';
//$apiUrl = "http://localhost/my-weather-api.php?city={$city}";


$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die('Error fetching weather data');
}

$data = json_decode($response, true);

$temperature = $data['main']['temp'];
$humidity = $data['main']['humidity'];
$description = $data['weather'][0]['description'];

$stmt = $conn->prepare("INSERT INTO weather_reports (city, temperature, humidity, description) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdis", $city, $temperature, $humidity, $description);
$stmt->execute();

$stmt->close();
$conn->close();
?>
