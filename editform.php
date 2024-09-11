<?php
include 'db_connection.php';

if (isset($_GET['Participant_ID'])) {
    $participant_id = $_GET['Participant_ID'];

    // Fetch participant's scores from the database
    $sql = "
        SELECT p.name, 
               s1.Score AS Score1, 
               s2.Score AS Score2, 
               s3.Score AS Score3, 
               s4.Score AS Score4, 
               s5.Score AS Score5, 
               s6.Score AS Score6, 
               s7.Score AS Score7
        FROM participant p
        LEFT JOIN score s1 ON s1.Participant_ID = p.Participant_ID AND s1.ScoreName = 'Score1'
        LEFT JOIN score s2 ON s2.Participant_ID = p.Participant_ID AND s2.ScoreName = 'Score2'
        LEFT JOIN score s3 ON s3.Participant_ID = p.Participant_ID AND s3.ScoreName = 'Score3'
        LEFT JOIN score s4 ON s4.Participant_ID = p.Participant_ID AND s4.ScoreName = 'Score4'
        LEFT JOIN score s5 ON s5.Participant_ID = p.Participant_ID AND s5.ScoreName = 'Score5'
        LEFT JOIN score s6 ON s6.Participant_ID = p.Participant_ID AND s6.ScoreName = 'Score6'
        LEFT JOIN score s7 ON s7.Participant_ID = p.Participant_ID AND s7.ScoreName = 'Score7'
        WHERE p.Participant_ID = :participant_id
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':participant_id', $participant_id, PDO::PARAM_INT);
    $stmt->execute();
    $participant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$participant) {
        echo "Participant not found.";
        exit();
    }
} else {
    echo "Participant ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre Fire Scoreboard</title>
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

    <h2>Edit Scores for <?php echo htmlspecialchars($participant['name']); ?></h2>

    <form method="post" action="editscores.php">
        <input type="hidden" name="Participant_ID" value="<?php echo htmlspecialchars($participant_id); ?>">

        <label for="Score1">Score 1:</label>
        <input type="number" name="Score1" value="<?php echo htmlspecialchars($participant['Score1'] ?? '0'); ?>"><br>

        <label for="Score2">Score 2:</label>
        <input type="number" name="Score2" value="<?php echo htmlspecialchars($participant['Score2'] ?? '0'); ?>"><br>

        <label for="Score3">Score 3:</label>
        <input type="number" name="Score3" value="<?php echo htmlspecialchars($participant['Score3'] ?? '0'); ?>"><br>

        <label for="Score4">Score 4:</label>
        <input type="number" name="Score4" value="<?php echo htmlspecialchars($participant['Score4'] ?? '0'); ?>"><br>

        <label for="Score5">Score 5:</label>
        <input type="number" name="Score5" value="<?php echo htmlspecialchars($participant['Score5'] ?? '0'); ?>"><br>

        <label for="Score6">Score 6:</label>
        <input type="number" name="Score6" value="<?php echo htmlspecialchars($participant['Score6'] ?? '0'); ?>"><br>

        <label for="Score7">Score 7:</label>
        <input type="number" name="Score7" value="<?php echo htmlspecialchars($participant['Score7'] ?? '0'); ?>"><br>

        <button type="submit">Confirm</button>
    </form>
</body>
</html>
