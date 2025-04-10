<?php
header('Content-Type: application/json');

$city = $_GET['city'] ?? null;

if (!$city) {
    echo json_encode(['error' => 'City is required']);
    exit;
}

// Sample data
$weatherData = [
    'London' => [
        'temperature' => 16.5,
        'humidity' => 60,
        'description' => 'partly cloudy'
    ],
    'New York' => [
        'temperature' => 22.1,
        'humidity' => 70,
        'description' => 'clear sky'
    ],
    'Delhi' => [
        'temperature' => 30.2,
        'humidity' => 80,
        'description' => 'hot and humid'
    ]
];

$city = ucwords(strtolower($city)); // normalize casing

if (array_key_exists($city, $weatherData)) {
    echo json_encode([
        'city' => $city,
        'temperature' => $weatherData[$city]['temperature'],
        'humidity' => $weatherData[$city]['humidity'],
        'description' => $weatherData[$city]['description']
    ]);
} else {
    echo json_encode(['error' => 'No weather data found for this city']);
}
