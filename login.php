
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
    <title>login form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
      crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form  method="post">
         

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input  type="text" id="student_id" name="student_id" required class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Student ID</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" required class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <input  name="loginB" type="submit" class="btn btn-primary btn-lg btn-block">
            <?php
            if(isset($_POST['loginB'])){

              $student_id = $_POST["student_id"];
               $password = $_POST["password"];
               $_SESSION['userid']= $_POST['student_id'];

                  // Check if the student has already voted
            $check_voted_query = "SELECT has_voted FROM students WHERE id = '$student_id' 
            AND password = '$password'";
            $result_select = mysqli_query($conn ,$check_voted_query );

            $number = mysqli_num_rows($result_select);
            if ( $number == 1) {

              $row = mysqli_fetch_assoc($result_select);

           
              if ($row["has_voted"] == 0) {

             
              
              
                 header("Location: candidate.php");



              }else {
              echo "<script> alert(' Nio horaa usoo codeese  ')</script>";
          }


              echo "<script> alert('u are logged in ')</script>";
            } else {
              echo "<script> alert(' u dont exist ')</script>";
          }


            }
            
            
            
            
            ?>

      

            

            <hr class="my-4">

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>