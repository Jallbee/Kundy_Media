<?php
// Read JSON file
$jsonData = file_get_contents('reviews.json');

// Decode JSON data into PHP associative array
$data = json_decode($jsonData, true);

// Retrieve the rating (assuming it's an array of reviews)
$rating = $data['reviews'][0]['rating']; // Assuming the rating is inside 'reviews' array

// Function to convert rating into star rating
function convertToStars($rating) {
    $fullStars = floor($rating);
    $halfStar = ceil($rating - $fullStars);
    $emptyStars = 5 - $fullStars - $halfStar;

    $stars = "";
    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '<i class="fas fa-star"></i>';
    }
    if ($halfStar == 1) {
        $stars .= '<i class="fas fa-star-half-alt"></i>';
    }
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '<i class="far fa-star"></i>';
    }

    return $stars;
}

// Convert rating to star rating
$starRating = convertToStars($rating);

// Output star rating
echo "Rating: " . number_format($rating, 1) . "<br>"; // Show the actual numeric value with one decimal place
echo "Star Rating: " . $starRating;
?>