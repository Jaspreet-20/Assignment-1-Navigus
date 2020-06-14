<?php

include("connection.php");

session_start();

$email=$_POST['Email'];
$password=$_POST['Password'];

$query="select User_id,First_Name,Email,Password from User_Detail where email='$email'";
$queryexecute=mysqli_query($link,$query);

if($queryexecute)
{
     $count=mysqli_num_rows($queryexecute);
     if($count > 0)
     {
        $result=mysqli_fetch_assoc($queryexecute);
        if($email == $result["Email"])
        {
          if($password == $result["Password"])
          {
            $temp=$result['User_id'];
            $_SESSION['login']=true;
            $_SESSION['username']=$result['First_Name'];
            unset($_SESSION["Online_User"]);
            if(isset($_SESSION["Online_User"]))
            {
             $OnlineUser=array_column($_SESSION["Online_User"],"User_id");
             if(!in_array($result["User_id"],$OnlineUser))
             {
               $count=count($_SESSION["Online_User"]);
               $User_array=array(
                    'User_id'   =>  $result["User_id"],
                    'User_name' =>  $result["First_Name"]
               );
               $_SESSION["Online_User"][$count]=$User_array;
             }
          }
          else{
            $User_array=array(
              'User_id'   =>  $result["User_id"],
              'User_name' =>  $result["First_Name"]
            );
            $_SESSION["Online_User"][0]=$User_array;
          }
 // Store The Timestamp OF user
 $query="insert into timedetail (User_Id) values('$temp')";
 $queryexecute=mysqli_query($link,$query);

            header("refresh:1;url=Homepage.php");
            echo "Successfully Logged In Redirecting............";
          }
          else {
            header("refresh:1;url=../Html/LoginPage.html");
            echo "Incorrect Details";
          }
        }
        else {
          header("refresh:1;url=../Html/LoginPage.html");
          echo "Incorrect Details";
        }
     }
else {
  echo "Not Registered";
  header("refresh:1;url=../Html/Registration.html");
     }
}
 ?>
