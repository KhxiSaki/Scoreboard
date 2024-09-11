<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $participant_id = $_POST['Participant_ID'];
    $score1 = $_POST['Score1'] ?? 0;
    $score2 = $_POST['Score2'] ?? 0;
    $score3 = $_POST['Score3'] ?? 0;
    $score4 = $_POST['Score4'] ?? 0;
    $score5 = $_POST['Score5'] ?? 0;
    $score6 = $_POST['Score6'] ?? 0;
    $score7 = $_POST['Score7'] ?? 0;

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // SQL to insert or update the scores in the 'score' table
        $sql = "
            INSERT INTO score (ScoreName, Score, Participant_ID) 
            VALUES (:score_name, :score, :participant_id)
            ON DUPLICATE KEY UPDATE Score = :score";

        $stmt = $pdo->prepare($sql);

        // Update each score (Score1 to Score7)
        $scores = [
            ['ScoreName' => 'Score1', 'Score' => $score1],
            ['ScoreName' => 'Score2', 'Score' => $score2],
            ['ScoreName' => 'Score3', 'Score' => $score3],
            ['ScoreName' => 'Score4', 'Score' => $score4],
            ['ScoreName' => 'Score5', 'Score' => $score5],
            ['ScoreName' => 'Score6', 'Score' => $score6],
            ['ScoreName' => 'Score7', 'Score' => $score7]
        ];

        // Loop through the scores and execute the query
        foreach ($scores as $score) {
            $stmt->execute([
                ':score_name' => $score['ScoreName'],
                ':score' => $score['Score'],
                ':participant_id' => $participant_id
            ]);
        }

        // Commit the transaction
        $pdo->commit();

        // Redirect to the edit user details page with a success message
        header("Location: edituserdetails.php?success=1");
        exit();

    } catch (PDOException $e) {
        // Rollback transaction if there's an error
        $pdo->rollBack();
        echo "Error updating scores: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
