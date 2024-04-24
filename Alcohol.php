<?php
include 'database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['drinkName'])) {
        $drinkName = $_POST['drinkName'];
        $descript = $_POST['description'];

        $sql = "INSERT INTO `Alcohol` (`drinkName`, `recipe`)
        VALUES (:drinkName, :descript)";

        $statement = pdo($pdo, $sql, ['drinkName' => $drinkName, 'descript' => $descript]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alcohol Reviews!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Alcohol.css">
</head>
<body>
    <div class="header"> 
        <a href="Homepage.html">
            <img src="Images/K-Media.PNG" alt="Kunda Media Logo" style="height:200px; width:220px;">
        </a>
        <h3 style="text-align: right;">
            <a href="About.html"> About</a>
            <a href="age.php"> Alcohol Reviews</a>
            <a href="Games.html"> Game Reviews</a>
            <a href="Contact.html"> Contact us!</a>
        </h3>
    </div>
    </div>
    <div class="container">
        <h1>Alcohol Reviews</h1>
        <div id="reviews" class="card-container"></div>
    </div>

    <h1 style="text-align:center;">Share Your Alcohol or drink Suggestions</h1>
    <form id="drinkForm" method="post" style="text-align:center;">
        <label for="drinkName">Name:</label>
        <input type="text" id="drinkName" name="drinkName" required>
        <br>
        <label for= "description">Description:</label> 
        <textarea id= "description" name= "description" rows= "4" required></textarea> 
        <br> <button type= "submit">Submit</button> </form>

   <div id= "suggestions"></div>

    <script src= "https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    <script src= "JS/Alcohol.js"></script>

    
</body>
</html>
</body>
</html>