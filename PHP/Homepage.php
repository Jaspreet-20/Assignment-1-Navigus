<?php

include("connection.php");

session_start();

$name=$_SESSION['username'];

$query="select User_Id from User_Detail where First_Name='$name'";

$data=mysqli_query($link,$query);

$output=mysqli_fetch_assoc($data);

$userid=$output['User_Id'];
//Logout Statment
if(isset($_GET['action']))
{
  $query="UPDATE timedetail set Logout_Time=CURRENT_TIMESTAMP() WHERE User_Id='$userid' and Logout_Time='0000-00-00 00:00:00'";
  $queryexecute=mysqli_query($link,$query);

  foreach ($_SESSION["Online_User"] as $keys => $values) {
     if($values["User_id"] == $_GET["id"])
     {
       unset($_SESSION["Online_User"][$keys]);
       echo '<script>window.location="../Html/LoginPage.html"</script>';
     }
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Main Page</title>
  <link rel="stylesheet" href="../CSS/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../CSS/HomePage.css">
  <link rel="stylesheet" href="../Image/cute-anime-eyes-png.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body class="jumbotron">
  
  <!-- Header Page  -->
  <header>
    <span id="UserName">Welcome Here to Get New Experience <button type="submit" id="logout_button" name="button_remove" onclick="window.location.href='Homepage.php?action&id=<?php echo $output["User_Id"]; ?>'">Signout</button></span>
    <img src="../Image/cute-anime-eyes-png.png" alt="Logo" height="100" width="120" id="logo">
    <hr>
  </header>

  <section class="middle">
    <div class="sub_middle">
      <div class="spinner-grow text-primary"></div>
      <div class="spinner-grow text-success"></div>
      <div class="spinner-grow text-info"></div>
      <div class="spinner-grow text-warning"></div>
      <div class="spinner-grow text-danger"></div>
      <div class="spinner-grow text-secondary"></div>
      <div class="spinner-grow text-dark"></div>
      <div class="spinner-grow text-light"></div>
    </div>
  </section>
  
  <div class="Upper">
    <span>Currently Logged in User's</span>
    <span class="badge badge-primary">Refresh For update</span>
    <?php
    if(!empty($_SESSION["Online_User"]))
    {
       foreach ($_SESSION["Online_User"] as $keys => $values) {
     ?>

    <div class="test rounded-circle"  data-toggle="tooltip" title=<?php echo $values['User_name'] ?> ><span id="Innertext"><?php echo $values['User_name'][0]; ?></span></div>
  <?php } ?>
</div><hr>
<?php } ?>
  <div class="Lower">
    <span>Logged in History</span>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Logged in Time</th>
          <th>Logged out Time</th>
          <th>Email</th>
        </tr>
      </thead>
      <?php
        $query="Select * from User_Detail u,timedetail t where u.User_id=t.User_id";
        $queryexecute=mysqli_query($link,$query);
        $count=0;
        if($queryexecute)
        {
         $count=mysqli_num_rows($queryexecute);
        }
        while($row = mysqli_fetch_array($queryexecute))
        {
       ?>
      <tbody>
        <tr>
          <td><?php echo $row["First_Name"]; ?></td>
          <td><?php echo $row["Last_Name"]; ?></td>
          <td><?php echo $row["LogIn_TIme"]; ?></td>
          <td><?php echo $row["Logout_Time"]; ?></td>
          <td><?php echo $row["Email"]; ?></td>
        </tr>
      </tbody>
    <?php } ?>
      <tfoot>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Logged in Time</th>
          <th>Logged out Time</th>
          <th>Email</th>
        </tr>
      </tfoot>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>


</body>

</html>
