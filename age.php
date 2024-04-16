<?php
include 'validation_functions.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $country = $_POST['country'];

    // Validate name length
    if (!is_valid_text_length($name, 2, 50)) {
        $error_message = "Name must be between 2 and 50 characters long.";
    }

    // Validate age
    if (!isset($error_message) && !is_valid_number($age, 21, 150)) {
        $error_message = "Invalid age.";
    }

    // Valid options for country
    $options = array("USA", "UK", "Canada");

    // Validate country
    if (!isset($error_message) && !is_valid_option($country, $options)) {
        $error_message = "Invalid country.";
    }

    // If there are no errors, user passed the age verification
    if (!isset($error_message)) {
        $age_verified = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="CSS/Age.css">
    <title>Age Verification</title>
</head>
<body>
     <a href="Homepage.html">
            <img src="Images/K-Media.PNG" alt="Kunda Media Logo" style="height:200px; width:220px;">
        </a>
        <h3 style="text-align: right;">
            <a href="About.html"> About</a>
            <a href="Alcohol.html"> Alcohol Reviews</a>
            <a href="Games.html"> Game Reviews</a>
            <a href="Contact.html"> Contact us!</a>
        </h3>
    <?php if (isset($age_verified) && $age_verified): ?>
        <!-- Show HTML content for unlocked page -->
        <h2>Welcome!</h2>
        <p>This is the unlocked content. You passed the age verification.</p>
    <?php else: ?>
        <!-- Show age verification form -->
        <h2>Age Verification</h2>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br><br>
            
            <label for="country">Country:</label>
            <select name="country" id="country" required>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Canada">Canada</option>
            </select><br><br>
            
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>
<?php
include 'validation_functions.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $country = $_POST['country'];

    // Validate name length
    if (!is_valid_text_length($name, 2, 50)) {
        $error_message = "Name must be between 2 and 50 characters long.";
    }

    // Validate age
    if (!isset($error_message) && !is_valid_number($age, 0, 150)) {
        $error_message = "Invalid age.";
    }

    // Valid options for country
    $options = array("USA", "UK", "Canada");

    // Validate country
    if (!isset($error_message) && !is_valid_option($country, $options)) {
        $error_message = "Invalid country.";
    }

    // If there are no errors, user passed the age verification
    if (!isset($error_message)) {
        $age_verified = true;
    }
}

// If age is verified, redirect to the unlocked page
if (isset($age_verified) && $age_verified) {
    header("Location: ./Alcohol.html");
    exit;
}
?>


