<?php
include 'db_connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fetch user data and their scores from the database
$sql = "
    SELECT p.name, 
           p.Participant_ID, 
           p.Group_ID, 
           s1.Score AS Score1, 
           s2.Score AS Score2, 
           s3.Score AS Score3, 
           s4.Score AS Score4, 
           s5.Score AS Score5, 
           s6.Score AS Score6, 
           s7.Score AS Score7,
           (IFNULL(s1.Score, 0) + IFNULL(s2.Score, 0) + IFNULL(s3.Score, 0) + IFNULL(s4.Score, 0) + 
            IFNULL(s5.Score, 0) + IFNULL(s6.Score, 0) + IFNULL(s7.Score, 0)) AS TotalScore
    FROM participant p
    LEFT JOIN score s1 ON s1.Participant_ID = p.Participant_ID AND s1.ScoreName = 'Score1'
    LEFT JOIN score s2 ON s2.Participant_ID = p.Participant_ID AND s2.ScoreName = 'Score2'
    LEFT JOIN score s3 ON s3.Participant_ID = p.Participant_ID AND s3.ScoreName = 'Score3'
    LEFT JOIN score s4 ON s4.Participant_ID = p.Participant_ID AND s4.ScoreName = 'Score4'
    LEFT JOIN score s5 ON s5.Participant_ID = p.Participant_ID AND s5.ScoreName = 'Score5'
    LEFT JOIN score s6 ON s6.Participant_ID = p.Participant_ID AND s6.ScoreName = 'Score6'
    LEFT JOIN score s7 ON s7.Participant_ID = p.Participant_ID AND s7.ScoreName = 'Score7'
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$participants = $stmt->fetchAll();
?>

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
        <?php
       foreach ($participants as $participant) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($participant['name'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Participant_ID'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Group_ID'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score1'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score2'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score3'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score4'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score5'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score6'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['Score7'] ?? '0') . "</td>";
        echo "<td>" . htmlspecialchars($participant['TotalScore'] ?? '0') . "</td>";
        echo "<td><a href='editform.php?Participant_ID=" . $participant['Participant_ID'] . "'>Edit</a></td>";
        echo "</tr>";
    }

        ?>
    </table>
</html>