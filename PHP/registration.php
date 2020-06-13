<?php

include("connection.php");
$Fname=$_POST['First_Name'];
$Lname=$_POST['Last_name'];
$Contact=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];

$query="Select * from User_Detail where Email='$email'";
$result=mysqli_query($link,$query);
if($result)
{
     $count=mysqli_num_rows($result);
     if($count > 0)
     {
       header("refresh:3;url=LoginPage.html");
       echo "Already Registered Redirecting............";
     }
     else
     {
           $query="INSERT INTO User_Detail (First_Name,Last_Name,Contact,Email,Password) values('$Fname','$Lname','$Contact','$email','$password')";
           $result=mysqli_query($link,$query);
           if($result)
             {
               header("refresh:3;url=LoginPage.html");
               echo "Successfully Registered Redirecting............";
             }
     }
   }


?>
