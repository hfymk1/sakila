<!DOCTYPE html>
<html>
<head>
  <title> SAKILA </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial scale=1,0">
  <style>
    *{
      box-sizing: border-box;
    }
    body{
      background-color: #222222;
    }
    p{
      font-family: inherit;
      font-size: 30px;
      text-align: center;
    }
    .sakila{
      text-align: center;
      color: red;
      font-size: 70px;
      font-family: impact;
    }
    .sakila a{
      text-decoration: none;
      color: inherit;
    }
    .topbar{
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }
    .topbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .topbar a:hover, .dropdown:hover{
      background-color: #111;
      transition-duration: 0.5s;
    }
    .topbar .active {
      background-color: red;
    }
    .seltable{
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #444;
    }
    .dropdown{
      float: left;
      overflow: hidden;
    }
    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: #444;
      font-family: inherit;
      margin: 0;
      display: block;
    }
    .arrow{
      border: solid white;
      border-width: 0 2px 2px 0;
      display: inline-block;
      padding: 2px;
    }
    .down{
      transform: rotate(45deg);
      -webkit-transform: rotate(45deg);
    }
    .dropdown-content{
      display: none;
      position: absolute;
      margin-left: 56px;
      background-color: #333;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a {
      float: none;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .dropdown-content .active{
      background-color: red;
    }
    .dropbtn:hover{
      background-color: #111;
      transition-duration: 0.5s;
    }
    .dropdown-content a:hover {
      background-color: #111;
      transition-duration: 0.5s;
    }
    .dropdown:hover .dropdown-content{
      display: block;
      transition-duration: 0.5s;
    }
    /*style for maintext*/
    #maintext{
      background-color: #444;
      width: 100%;
      height: 100%;
      display: block;
      float: left;
      color: white;
      padding: 15px;
      font-family: "Times New Roman";
    }
    #maintext table{
      width: 100%;
    }
    @media (max-width: 600px) {
      .sakila .topbar, #maintext {
        width: 100%;
        height: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="sakila">
    <a href="main.php">
      SAKILA
    </a>
  </div>
<div class="topbar">

	 <a href="staff.php" class="active"> Back </a>
	 <a href="index.php" class="active"> Exit </a>
  </div>
  <!-- Connect to MySQLi -->
  <?php
    $servername = "localhost";
    $username = "hcyjn1_root";
    $password = "dnigroupsupper";
    $db = "hcyjn1_sakila";

    $conn = new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
      die("Connection failed: ".$conn->connect_error);
    }
  ?>


  <div id="maintext">
    <p>Staff</p>
    <?php
    $sql = "SELECT * FROM staff";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      echo "<table border='1'>";
      echo "<tr>";
      echo "<th> Staff ID </th>";
      echo "<th> Name </th>";
      echo "<th> Address ID </th>";
      echo "<th> Email </th>";
      echo "<th> Store ID </th>";
      echo "<th> Active </th>";
      echo "<th> Username </th>";
      echo "<th> Password </th>";
      echo "<th> Last Update </th>";
      echo "<th> Update </th>";
      echo "</tr>";
      while($row = $result->fetch_assoc()) {
        $Get_ID =$row["staff_id"];
        $Get_fname =$row["first_name"];
        $Get_lname =$row["last_name"];
        $Get_addID =$row["address_id"];
        $Get_email =$row["email"];
        $Get_storeID =$row["store_id"];
        $Get_active =$row["active"];
        $Get_uname =$row["username"];
        $Get_pw =$row["password"];
        echo "<tr>";
        echo "<td>".$row["staff_id"]."</td>";
        echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
        echo "<td>".$row["address_id"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["store_id"]."</td>";
        echo "<td>".$row["active"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["password"]."</td>";
        echo "<td>".$row["last_update"]."</td>";
        echo "<td> <form action='updatestaffform.php' method='POST' >";
        echo "<input type='hidden' name='Get_ID' value='" .$row["staff_id"] ."'>";
        echo "<input type='hidden' name='Get_fname' value='" .$row["first_name"] ."'>";
        echo "<input type='hidden' name='Get_lname' value='" .$row["last_name"] ."'>";
        echo "<input type='hidden' name='Get_addID' value='" .$row["address_id"] ."'>";
        echo "<input type='hidden' name='Get_email' value='" .$row["email"] ."'>";
        echo "<input type='hidden' name='Get_storeID' value='" .$row["store_id"] ."'>";
        echo "<input type='hidden' name='Get_active' value='" .$row["active"] ."'>";
        echo "<input type='hidden' name='Get_uname' value='" .$row["username"] ."'>";
        echo "<input type='hidden' name='Get_pw' value='" .$row["password"] ."'>";
        echo "<input type='submit' name='Update' value='Update'> </form> </td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    else {
      echo "0 results";
    }

    ?>
  </div>


  <!-- Close MySQLi Connection -->
  <?php
    $conn->close();
  ?>

</body>
</html>
