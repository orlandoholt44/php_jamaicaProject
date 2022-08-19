<?php
    require_once('connection.php');

    if(isset($_POST['submit'])){

        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
	
     //   $gender =  isset($_POST['gender']);
	
       if(isset($_POST['gender']))
        {
            $gender = "Male";
        }
        else{
            $gender = "Female";
        }
       
		$dob = $_POST['dob'];
		$country = $_POST['country'];
		$phone = $_POST['phone'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        $msg = "";
        $profile = $_FILES["profile"]["name"];
        $tempname = $_FILES["profile"]["tmp_name"];	
        $folder = "profile/".$profile;

       $sql = "INSERT INTO `user_db`(`firstname`, `lastname`, `email`, `gender`, `dob`, `country`, `image`, `phone`, `username`, `password`)
             VALUES ('$firstname','$lastname','$email','$gender','$dob','$country','$profile','$phone','$username','$password')";
        
       	if($con->query($sql) === TRUE)
        {
            // Now let's move the uploaded image into the folder: image
            echo "<h4><i>Record added successfully</i></h4><br>";
            echo "<h1>Profile Information</h1> <br>";
            echo "First Name:<input value='$firstname'> <br>
            Last Name: <input value='$lastname'> <br>
            Email: <input value='$email'> <br>
            Gender: <input value='$gender'> <br>
            Date of Birth: <input value='$dob'> <br>
            Country: <input value='$country'> <br>
            Profile: <input value='$profile'> <br>
            Phone: <input value='$phone'> <br>
            Username: <input value='$username'> <br>
            Password: <input value='$password'> ";   
        }
        else
        {
            echo "There was an error, file was not added to the database";
        }
        
        if(move_uploaded_file($tempname, $folder)) 
        {
            $msg = "Image uploaded successfully";
        }
        else{
            $msg = "Failed to upload image";
        }
    }
    else
    {
        echo "Record was not added to the database.";
    }

    echo "<p class='link'><a href='index.php'>Home</a></p>";
?>