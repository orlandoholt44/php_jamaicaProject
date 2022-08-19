<?php
    require_once('connection.php');

    if(!isset($_GET['id'])){
        //
        die('No record was selected for Update');
    }
  
   $id = $_GET['id'];
   $sql = "SELECT * FROM `user_db` WHERE id ='".$id."'";
   $result = mysqli_query($con, $sql);

   while($row=mysqli_fetch_assoc($result)){
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $country = $row['country'];
    $image = $row['image'];
    $phone = $row['phone'];
    $username = $row['username'];
    $password = $password= $row['password'];
   }
   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css"/>

    <title>Registration Website</title>
  </head>
  <body>
    <div class="nav_bar">
          <h1><a href="index.php" class ="logo"><img src="image/holt.png"></a></h1> 
            <ul>
              <li id="home" name="home"><a href="index.php">Home</a></li>
              <li id="registration" name="registration"><a href="registration.php">Registration</a></li>
              <li id="about" name="about"><a href="about.php">About</a></li>
              <li id="contact" name="contact"><a href="contact.php">Contact</a></li>
            <li id="login" name="login"><a>Login Here</a> 
                  <ul>  
                    <li><a href="login.php">User</a></li>
                    <li><a href="admin.php">Admin</a></li>
                  </ul>
              </li> 
            </ul>
            <hr>
    </div> 

    <div class ="jumbotron">
        <h1 class="text-center">
           Update Records
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <form action="edit.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                    <strong> <label for="name">First Name</label></strong>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname?>"> <br>
                    </div>
                    <div class="form-group">
                    <strong> <label for="name">Last Name</label></strong>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname?>"><br>
                    </div>
                    <div class="form-group">
                    <strong> <label for="name">Email</label></strong>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email?>"><br>
                    </div>
                    
                    
                    <div class="form-group">
                    <strong> <label for="name">Gender</label></strong>
                        <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender?>"><br>
                    </div>
                    <div class="form-group">
                    <br><strong>  <label for="name">Date of Birth</label> </strong>
                        <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $dob?>"><br>
                    </div>
                    <div class="form-group">
                    <strong>  <label for="name">Country</label> </strong>
                        <input type="text" class="form-control" name="country" id="country" value="<?php echo $country?>"><br>
                    </div>
                    <div class="form-group">
                        <strong><label for="formFile"> Profile Picture</label> </strong>
                        <input class="form-control" type="file" name="profile" id="formFile" value="<?php echo $image?>"><br>
                    </div>

                    <div class="form-group">
                    <strong>  <label for="name">Phone</label> </strong>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone?>"><br>
                    </div>
                    <div class="form-group">
                       <strong> <label for="name">Username</label></strong>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $username?>"><br>
                    </div>
                    <div class="form-group">
                    <strong>  <label for="name">Password</label></strong>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $password?>"><br>
                    </div>
                   
                    <div class="d-grid gap-2">
                         <input type="submit" name="submit" value="Update" class="btn btn-primary block"> 
                    </div>
                    <p class="link"><a href="login.php">Click to Login</a></p>
                    <p class="link"><a href="index.php">Home</a></p><br>
                </form>
            </div>
    </div>
    </div>   
  </body>
</html>