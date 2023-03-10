<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
<div class="navbar">
        <div class="navbar__logo">
          <img class="starbucks" src="./../assets/logomerahremovebg.png" alt="Logo" />
        </div>
        <div class="navbar-menu__wrapper">
          <div class="navbar__menu">
            <a href="../"> Home </a>
            <a href="baru/review.php" class="active"> Reviews </a>
          </div>
          <!-- <div class="navbar__auth">
            <a href="#" class="sign-in">Sign In</a>
            <a href="#">Join Now</a>
          </div> -->
        </div>
        <div class="navbar-menu__small-device">
          <img src="/../assets/logo.jpeg" alt="Bars" />
        </div>
</div>
</body>
</html>
<?php
    // connect with database
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "dbkel7";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    if(isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];
    
    $sql = "INSERT INTO testimonials (name,email,comment) VALUES ('$name','$email','$comment')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}
    
     mysqli_close($conn);       
    // create new field for full comment text
    // because we will be displaying less text and display 'show more' button
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>

        <!-- container for vue js app -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;" id="addTestimonialApp">
    <div class="row">
        <!-- center align form -->
        <div class="offset-md-3 col-md-6">
            <h2 style="margin-bottom: 30px;">Add Testimonial</h2>
 
 			<!-- form to add testimonial -->
            <form action="" method="post">
                <!-- name of user -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>

                <!-- designation of user -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>

                <!-- comment -->
                <div class="form-group">
                    <label>Comment</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>

                <!-- submit button -->
                <input type="submit" name="submit" class="btn btn-info" value="Add Testimonial" />
            </form>
        </div>
    </div>
<div class="d-flex justify-content-center">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
        <table border="2" style="width:800px; line-height:40px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $servername='localhost';
                $username='root';
                $password='';
                $dbname = "dbkel7";
                $conn=mysqli_connect($servername,$username,$password,"$dbname");
                if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($conn,"SELECT * FROM testimonials");

                    
        while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "</tr>";
        }
 

        mysqli_close($conn);
        ?>
</tbody>

        </div>
    </div>
    </div>

    

</div>
<!-- include vue js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
