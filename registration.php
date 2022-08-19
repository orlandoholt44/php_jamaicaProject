<?php
   require_once("connection.php"); //connection to the database

   $firstnameErr = "";   //Variable fields that will be validated currently set empty
   $lasttnameErr ="";
   $emailErr = "";  
   $genderErr = "";  
   $dobErr = "";
   $countryErr = "";
   $usernameErr = "";
   $passwordErr = "";
   $phoneErr = "";
   if (isset($_POST['submit'])) {   
    if(isset($_POST['firstname']) &&  isset($_POST['lastname']) &&  isset($_POST['email']) &&  isset($_POST['gender'])
    &&  isset($_POST['dob']) &&  isset($_POST['country']) &&  isset($_POST['username']) &&  isset($_POST['password']) &&  isset($_POST['phone']) ){
       include("create.php"); //processing to save the record
       exit();
    } }
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
  
     //Validation Messages
           //First Name Validation
            if (empty($_POST["firstname"])) {  
               $firstnameErr = "Please enter your first name";  
            } 
            else if (!preg_match("/^[a-zA-Z- ]*$/", $_POST["firstname"])) 
               {  
                $firstnameErr = "Only letters and white space are allowed"; 
            }
            else {  
               $firstname = check($_POST["firstname"]);
            }  
            
            //Last Name Validation
            if (empty($_POST["lastname"])) {  
                $lastnameErr = "Please enter your last name";  
             } 
             else if (!preg_match("/^[a-zA-Z- ]*$/", $_POST["lastname"])) 
                {  
                 $lastnameErr = "Only letters and white space allowed"; 
             }
             else {  
                $lastname = check($_POST["lastname"]);
             }

             //Gender Validation
            if (empty($_POST["gender"])) {  
               $genderErr = "Please select a gender";  
            } else {  
               $gender = check($_POST["gender"]);  
            } 

            //Date of Birth Validation
            if (empty($_POST["dob"])) {  
                $dobErr = "Please state your date of birth";  
             } else {  
                $dob = check($_POST["dob"]);  
             } 
            
             //Country Validation
             if (empty($_POST["country"])) {  
                $countryErr = "Enther your country of birth";  
             } else {  
                $country = check($_POST["country"]);  
             } 

             //Username Validation
             if (empty($_POST["username"])) {  
                $usernameErr = "Please enter a username";  
             } 
             else if($_POST["username"] <= 5){
                $usernameErr = "Username must be greater than 5 characters!!";  
             }
            else {  
                $username = check($_POST["username"]);  
             } 
             
             //Email Validation
             if (empty($_POST["email"])) {  
               $emailErr = "Email is required";  
             } else {  
               $email = check($_POST["email"]);  
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                  $emailErr = "Invalid email format";   
               }  
             }  
            
             //Phone Validation
             if (empty($_POST["phone"])){  
               $phoneErr = "Specify your contact number";  
             } 
             else {  
               $phone = check($_POST["phone"]);  
              }
               if (!preg_match ("/^[0-9]*$/", $_POST["phone"])){
                $phoneErr = "In valid character"; 
             }

             //Password Validation
             if (empty($_POST["password"])) {  
               $passwordErr = "Please supply a password";  
             } 
             else if($_POST["password"] <= 7){
                $passwordErr = "Please supply a valid password greater than 7 characters!!"; 
             }
             else {  
               $password = check($_POST["password"]);  
             }  
             
        } 
        function check($data) 
         {  
          $data = trim($data);  
          $data = stripslashes($data);  
          $data = htmlspecialchars($data);  
          return $data;  
         } 
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            Registration Form
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                    <strong>   <label for="name">First Name</label></strong> <br>
                        <input type="text" class="form-control" name="firstname" id="firstname" autofocus="true"> 
                        <span class = "error"><?php if(isset($firstnameErr)){echo $firstnameErr;}?> </span><br>
                    </div>
                    <div class="form-group">
                    <strong> <label for="name">Last Name</label></strong> <br>
                        <input type="text" class="form-control" name="lastname" id="lastname">
                        <span class = "error"><?php if(isset($lastnameErr)){echo $lastnameErr;}?> </span> <br>
                    </div>
                    <div class="form-group">
                    <strong><label for="name">Email</label></strong><br>
                        <input type="text" class="form-control" name="email" id="email">
                        <span class = "error"><?php if(isset($emailErr)){echo $emailErr;}?> </span><br>
                    </div>
                    
                    <strong>  <label for="gender">Gender</label></strong>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                        </div>
                    <div class="form-check">
                        <label class="form-check-label" for="female">Female
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        </label><br>
                    </div>

                    <div class="form-group">
                    <br><strong>  <label for="name">Date of Birth</label> </strong><br>
                        <input type="date" class="form-control" name="dob" id="dob">
                        <span class = "error"><?php if(isset($dobErr)){echo $dobErr;}?> </span><br>
                    </div>
                    <div class="form-group">
                    <strong>  <label for="name">Country</label> </strong> <br>
                        <input type="text" class="form-control" name="country" id="country"><br>
                    </div>
                    <div class="form-group">
                        <strong><label for="formFile"> Profile Picture</label> </strong> <br>
                        <input class="form-control" type="file" name="profile" value="" id="formFile"><br>
                    </div>

                    <div class="form-group">
                    <strong>  <label for="name">Phone</label> </strong> <br>
                        <input type="text" class="form-control" name="phone" id="phone"><br>
                    </div>
                    <div class="form-group">
                        <strong><label for="name">Username</label></strong> <br>
                        <input type="text" class="form-control" name="username" id="username">
                        <span class = "error"><?php if(isset($usernameErr)){echo $usernameErr;}?> </span><br>
                    </div>
                    <div class="form-group">
                    <strong>  <label for="name">Password</label></strong> <br>
                        <input type="password" class="form-control" name="password" id="password">
                        <span class = "error"><?php if(isset($passwordErr)){echo $passwordErr;}?> </span><br>
                    </div>
                    <div class="d-grid gap-2">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary block"> 
                     
                    </div>
                    <p class="link"><a href="login.php">Click to Login</a></p>
                    <p class="link"><a href="index.php">Home</a></p><br>
                </form>
            </div>
    </div>
    </div> 
  </body>
</html>
