<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href=edituserdetails.php>Edit User Details</a></li>
            <li><a href="centrefire_scoreboard.php">Centre Fire Scoreboard</a></li>
            <li><a href="platescore_scoreboard.php">Plate Scoreboard</a></li>
        </ul>
    </nav>
</body>

<h2>Edit Participant's Details Here</h2>

<table>
        <tr>
            <th>Name</th>
            <th>Participant ID</th>
            <th>Group ID</th>
            <th>Score 1</th>
            <th>Score 2</th>
            <th>Score 3</th>
            <th>Score 4</th>
            <th>Score 5</th>
            <th>Score 6</th>
            <th>Score 7</th>
            <th>Total Score</th>
            <th>Action</th>
        </tr>
    </table>
</html>

<?php
include 'db_connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>