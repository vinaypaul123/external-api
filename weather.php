<?php
require 'db.php';

if (!isset($_GET['city'])) {
    http_response_code(400);
    echo json_encode(['error' => 'City is required']);
    exit;
}

$city = $_GET['city'];

$stmt = $conn->prepare("SELECT city, temperature, humidity, description, created_at FROM weather_reports WHERE city = ? ORDER BY created_at DESC LIMIT 1");
$stmt->bind_param("s", $city);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(['error' => 'No data found for this city']);
}

$stmt->close();
$conn->close();
?>
