<?php
// Read JSON file
$jsonData = file_get_contents('reviews.json');

// Decode JSON data into PHP associative array
$data = json_decode($jsonData, true);

// Check if 'reviews' key exists and it's not null
if (isset($data['reviews']) && is_array($data['reviews']) && !empty($data['reviews'])) {
    // Retrieve the first rating
    $rating = $data['reviews'][0]['rating'];

    // Check if the rating is not null
    if (!is_null($rating)) {
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
    } else {
        // Handle the case where rating is null
        echo "Rating: N/A<br>";
        echo "Star Rating: N/A";
    }
} else {
    // Handle the case where 'reviews' key doesn't exist or it's empty/null
    echo "No reviews available";
}
?>