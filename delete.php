<?php
    require_once('connection.php');
    if(isset($_GET['id'])){
       $id = $_GET['id'];
       $sql = "DELETE FROM `user_db` WHERE id = $id";

        if($con->query($sql) === TRUE){
            echo "The record was Deleted";
        }else{
            echo "Something went wrong";
        }
    }else{
        //for redirecting
        die('Id not provided');
    }
    echo "<div class='form'><p class='link'>Click here to <a href='admin2.php'>Back</a> again.</p></div>";
?>