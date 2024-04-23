<?php
include 'database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['gameName'])) {
        $gameName = $_POST['gameName'];
        $descript = $_POST['description'];

        $sql = "INSERT INTO `Games` (`gameName`, `description`)
        VALUES (:drinkName, :descript)";

        $statement = pdo($pdo, $sql, ['gameName' => $gameName, 'description' => $descript]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Reviews!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Games.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="header"> 
    <a href="Homepage.html">
        <img src="Images/K-Media-gaming.jpg" alt="Kunda Media Logo" style=" height:200px; width:220px;">
    </a>
    
</div>
<h1 style="text-align:center;">Game Reviews!</h1>
<div id="suggestions"></div>
<div id="reviews"></div>
<h1 style="text-align:center;">We are always looking for new Games to try from classic games to new releases <br>
    Video Game to Card Game to Tabletop Game!
    <br> Share Your Game Suggestions
</h1>
<form id="gameForm" style="text-align:center;">
    <label for="gameName">Game Name:</label>
    <input type="text" id="gameName" name="gameName" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>
    <br>
    <button type="submit">Submit</button>
</form>

<script src="JS/Games.js"></script>
</body>
</html>
