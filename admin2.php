<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   	<script src="ajax.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body>
	
	<div class='nav_bar'>
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
    <div class="container">
		<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Admin Center</b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>SL NO</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
						<th>EMAIL</th>
                        <th>GENDER</th>
                        <th>DOB</th>
                        <th>COUNTRY</th>
                        <th>PROFILE</th>
                        <th>PHONE</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
						<th>TASK</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
					$result = mysqli_query($con,"SELECT * FROM user_db");	//select data from database
					$i=1;
					//displaying all the records
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
					<td>
						<span class="custom-checkbox">
							<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
							<label for="checkbox2"></label>
						</span>
					</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["firstname"]; ?></td>
					<td><?php echo $row["lastname"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["dob"]; ?></td>
					<td><?php echo $row["country"]; ?></td>
					<td><?php echo $row["image"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["password"]; ?></td>
					<td>
						<?php echo "<a class='btn btn-primary text-light' href='./update.php?id=".$row['id']."'>Update</a>";?>
						<?php echo "<a class='btn btn-danger text-light' href='./delete.php?id=".$row['id']."'>Delete</a>";?>
					</td>
	
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			
			</table><div class= "container">
				<?php echo "<a class='btn btn-primary' href='./registration.php'>Create a New User</a>";?>
				<?php echo "<a class='btn btn-secondary' href='./logout.php'>Logout</a>";?>
			<!--	<p><a href="index.php">Back to Home</a></p>	--><br>
			</div>
		</div>
    </div>

</body>
</html>                                		                            