<?php
include 'db_connection.php';

try {
    // Fetch Top 3 groups based on total score in Plate
    $stmt = $pdo->prepare("
        SELECT g.Group_name, 
               p.TotalScore, 
               s1.Score AS Score1, 
               s2.Score AS Score2, 
               s3.Score AS Score3, 
               s4.Score AS Score4, 
               s5.Score AS Score5, 
               s6.Score AS Score6, 
               s7.Score AS Score7
        FROM platescore p
        JOIN `group` g ON p.group_ID = g.Group_ID
        LEFT JOIN score s1 ON s1.Participant_ID = g.Group_ID AND s1.ScoreName = 'Score1'
        LEFT JOIN score s2 ON s2.Participant_ID = g.Group_ID AND s2.ScoreName = 'Score2'
        LEFT JOIN score s3 ON s3.Participant_ID = g.Group_ID AND s3.ScoreName = 'Score3'
        LEFT JOIN score s4 ON s4.Participant_ID = g.Group_ID AND s4.ScoreName = 'Score4'
        LEFT JOIN score s5 ON s5.Participant_ID = g.Group_ID AND s5.ScoreName = 'Score5'
        LEFT JOIN score s6 ON s6.Participant_ID = g.Group_ID AND s6.ScoreName = 'Score6'
        LEFT JOIN score s7 ON s7.Participant_ID = g.Group_ID AND s7.ScoreName = 'Score7'
        ORDER BY p.TotalScore DESC
        LIMIT 3
    ");
    $stmt->execute();
    $topPlateScores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    error_log("Error fetching Plate scores: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plate Scoreboard</title>
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

    <h2>Top 3 Plate Group Scores</h2>
    <table>
        <tr>
            <th>Rank</th>
            <th>Group Name</th>
            <th>Score 1</th>
            <th>Score 2</th>
            <th>Score 3</th>
            <th>Score 4</th>
            <th>Score 5</th>
            <th>Score 6</th>
            <th>Score 7</th>
            <th>Total Score</th>
        </tr>
        <?php
        $rank = 1;
        foreach ($topPlateScores as $row) {
            echo "<tr>
                <td>{$rank}</td>
                <td>{$row['Group_name']}</td>
                <td>{$row['Score1']}</td>
                <td>{$row['Score2']}</td>
                <td>{$row['Score3']}</td>
                <td>{$row['Score4']}</td>
                <td>{$row['Score5']}</td>
                <td>{$row['Score6']}</td>
                <td>{$row['Score7']}</td>
                <td>{$row['TotalScore']}</td>
            </tr>";
            $rank++;
        }
        ?>
    </table>
</body>
</html>
