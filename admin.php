<?php
  // define variables and set to empty values
  $usernameErr = $passwordErr = "";
  $username = $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = check($_POST["username"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = check($_POST["password"]);
  }
}
//header('Location: profile.php');
require('connection.php');
session_start();

if(isset($_POST['submit']))
{
    if(empty($_POST['username']) ||empty($_POST['password']))
    {
      //header("Location: index.php");
      if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
      } else {
        $username = check($_POST["username"]);
      }
    
      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = check($_POST["password"]);
      }
    }
      else
      {
        $sql = "SELECT * FROM `website_db` WHERE username ='".$_POST['username']."' AND password='".$_POST['password']."'";
        $result =mysqli_query($con, $sql);

        if(mysqli_fetch_assoc($result))
        {
         // $_SESSION['username']=$_POST['username'];
          header("Location: admin2.php");
        }
          else
          {
            $passwordErr = "This Username and Password in not in the system.";
          }
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <meta name="viewpoint" content="width=device width, initial-scale=1.0">
</head>
<body>
  <div class='nav_bar'>
        <h1><a href="index.php" class ="logo"><img src="image/holt.png"></a></h1> 
          <ul>
            <li id="home" name="home"><a href="index.php">Home</a></li>
            <li id="registration" name="registration"><a href="registration.php">Registration</a></li>
            <li id="about" name="about"><a href="about.php">About</a></li>
            <li id="contact" name="contact"><a href="contact.php">Contact</a></li>
           <li id="login" name="login" value="
        <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>"><a>Login Here</a> 
                <ul>  
                  <li><a href="login.php">User</a></li>
                  <li><a href="admin.php">Admin</a></li>
               </ul>
            </li> 
          </ul>
          <hr>
    </div>  

<div class="box1">
<form class="form" method="post" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1 class="login-title"><strong>Admin Login</strong></h1>
        <input type="text" class="login-input" name="username" placeholder="Admin Username" autofocus="true"/>
        <span class = "error"><?php if(isset($usernameErr)){echo $usernameErr;}?> </span>

        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <span class = "error"><?php if(isset($passwordErr)){echo $passwordErr;}?></span>

        <div class="d-grid gap-2">
            <input type="submit" name="submit" value="Login" class="btn btn-primary block"> 
        </div>
        <p class="link"><a href="index.php">Home</a></p><br>
  </form>
    </div>
</body>
</html>