<?php
include '../includes/db.php';

// Query to fetch kos data
$sql = "SELECT id, image_url, title, price FROM kos_recommendations LIMIT 4";
$result = $conn->query($sql);

if ($result === false) {
    http_response_code(500);
    echo json_encode(["error" => "Query error: " . $conn->error]);
    exit;
}

$kosArray = [];
while ($row = $result->fetch_assoc()) {
    $kosArray[] = $row;
}

// Return data as JSON
header("Content-Type: application/json");
echo json_encode($kosArray);

// Close connection
$conn->close();
