<?php
// Read JSON file
$jsonFile = 'reviews.json';
$jsonData = file_get_contents($jsonFile);
$data = json_decode($jsonData, true);

// Check if JSON decoding was successful
if ($data === null) {
    die("Error decoding JSON");
}

// Display ratings
echo "<h1>Ratings</h1>";
echo "<ul>";
foreach ($data['ratings'] as $rating) {
    echo "<li>{$rating['name']}: {$rating['rating']}</li>";
}
echo "</ul>";
?>
