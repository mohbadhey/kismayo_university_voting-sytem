<?php
// Database connection setup


$conn =  mysqli_connect("localhost" , "root" , "" , "arday");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $password = $_POST["password"];
    $candidate_id = $_POST["candidate"];

    // Check if the student has already voted
    $check_voted_query = "SELECT has_voted FROM students WHERE id = '$student_id' AND password = '$password'";
    $check_voted_result = $conn->query($check_voted_query);

    if ($check_voted_result->num_rows == 1) {
        $row = $check_voted_result->fetch_assoc();
        if ($row["has_voted"] == 0) {
            // Update student's has_voted status to prevent multiple votes
            $update_voted_query = "UPDATE students SET has_voted = 1 WHERE id = '$student_id'";
            $conn->query($update_voted_query);

            // Update candidate's vote count
            $update_votes_query = "UPDATE candidates SET votes = votes + 1 WHERE id = '$candidate_id'";
            $conn->query($update_votes_query);

            echo $candidate_id;
            echo $candidate_id;

            echo "Vote successfully recorded!";
        } else {
            echo "You have already voted.";
        }
    } else {
        echo "Invalid student ID or password.";
    }
}

$conn->close();
?>
