# external-api

Run this URL to retrieve the inserted data. Currently, only the data for London is inserted.

http://localhost/external-api/weather.php?city=London

Give a valid api url for get real data

weather_fetcher.php

$apiKey = 'YOUR_API_KEY'; // Replace with your OpenWeather API key
$city = 'London'; // Default city
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
