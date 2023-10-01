<?php
// Database connection setup
$conn = mysqli_connect("localhost", "root", "", "arday");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch candidates and their votes
$candidates_query = "SELECT * FROM candidates";
$candidates_result = $conn->query($candidates_query);

$total_votes = 0;
$candidates = [];

while ($row = $candidates_result->fetch_assoc()) {
    $candidates[] = $row;
    $total_votes += $row["votes"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
      crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Voting Results</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr  class="table-danger">
                <th  scope="col">Name</th>
                <th scope="col">Result</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate) : ?>
                <?php $percentage = ($candidate["votes"] / $total_votes) * 100; ?>
                <tr  class="table-light">
                    <td><?php echo $candidate['name']; ?></td>
                    <td><?php echo $candidate['votes']; ?> votes (<?php echo round($percentage , 0)?>%)</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
