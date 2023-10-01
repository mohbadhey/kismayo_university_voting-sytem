<!DOCTYPE html>
<html>
<head>
    <title>Voting System</title>
</head>
<body>
    <h1>Welcome to the Voting System</h1>
    <form action="vote.php" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <h2>Candidates:</h2>
        <input type="radio" id="candidate1" name="candidate" value="1" required>
        <label for="candidate1">mohamed badhey </label><br>
        
        <input type="radio" id="candidate2" name="candidate" value="2" required>
        <label for="candidate2">maskax</label><br>
        
        <input type="submit" value="Vote">
    </form>
</body>
</html>
