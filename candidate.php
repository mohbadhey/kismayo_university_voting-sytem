
<?php

$conn =  mysqli_connect("localhost" , "root" , "" , "arday");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
      crossorigin="anonymous"></script>
      <style>
        input[type='radio']{
    width: 25px;
    height: 25px;
}
            .custom-col {
        margin-bottom: 50px; /* Adjust this value to control the space between the cards */
    }
        .food1 img {
    width:50%;
    height: 2px;

}
      </style>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
  <div class="container text-center">
    <div class="col-md-12">
    <form  method="post">




        <div class="card mb-2" style="width: 16rem; display: inline-block;  margin-right: 30px; border: 3px solid #ccc;">
            <img src="./images/a1.jpeg" class="card-img-top" alt="Image">
            <div class="card-body">
                 <input type="radio" id="candidate1" name="candidate" value="1" required>
             <label for="candidate1">mohamed badhey </label><br>
            </div>
        </div>
 
        <div class="card mb-2" style="width: 16rem; display: inline-block;  margin-right: 10px; border: 3px solid #ccc;">
            <img src="./images/a2.jpg" class="card-img-top" alt="Image">
            <div class="card-body">
            <input type="radio" id="candidate2" name="candidate" value="2" required>
        <label for="candidate2" class="text-center">maskax</label><br>
      
   

            </div>
           
        </div>
    </div>

 
    <input  class="btn btn-danger btn-lg btn-block" type="submit"   name="vote" value="Votee">
            </form>
</div>



  </div>
  
  </div>
</section>
<?php


    if(isset($_POST['vote'])){

        
        $candidate_id = $_POST["candidate"];
     
      
     

   
    
    
      // Update student's has_voted status to prevent multiple votes
      $update_voted_query = "UPDATE students SET has_voted = 1 WHERE id = '" . $_SESSION['userid'] . "'";

      $conn->query($update_voted_query);
    
      // Update candidate's vote count
      $update_votes_query = "UPDATE candidates SET votes = votes + 1 WHERE id = '$candidate_id'";
      $conn->query($update_votes_query);
    
      echo $candidate_id;
      echo $candidate_id;

      echo "<script> alert(' Vote successfully recorded!  ')</script>";
    

    }
   









?>

    
</body>
</html>