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

	 <a href="address.php" class="active"> Back </a>
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
    <p>Address</p>
    <?php
      $sql = "SELECT * FROM address";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th> Address ID </th>";
        echo "<th> Address </th>";
        echo "<th> District </th>";
        echo "<th> City ID </th>";
        echo "<th> Postal Code </th>";
        echo "<th> Phone Number </th>";
        echo "<th> Last Update </th>";
        echo "<th> Update </th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {

          $Get_addID =$row["address_id"];
          $Get_add =$row["address"];
          $Get_add2 =$row["address2"];
          $Get_dist =$row["district"];
          $Get_cityID =$row["city_id"];
          $Get_postal =$row["postal_code"];
          $Get_phone =$row["phone"];
          echo "<tr>";
          echo "<td>".$row["address_id"]."</td>";
          echo "<td>".$row["address"]."</td>";
          echo "<td>".$row["district"]."</td>";
          echo "<td>".$row["city_id"]."</td>";
          echo "<td>".$row["postal_code"]."</td>";
          echo "<td>".$row["phone"]."</td>";
          echo "<td>".$row["last_update"]."</td>";
          echo "<td> <form action='updateaddressform.php' method='POST' >";
          echo "<input type='hidden' name='Get_addID' value='" .$row["address_id"] ."'>";
          echo "<input type='hidden' name='Get_add' value='" .$row["address"] ."'>";
          echo "<input type='hidden' name='Get_add2' value='" .$row["address2"] ."'>";
          echo "<input type='hidden' name='Get_dist' value='" .$row["district"] ."'>";
          echo "<input type='hidden' name='Get_cityID' value='" .$row["city_id"] ."'>";
          echo "<input type='hidden' name='Get_postal' value='" .$row["postal_code"] ."'>";
          echo "<input type='hidden' name='Get_phone' value='" .$row["phone"] ."'>";
          echo "<input type='submit' name='Update' value='Update'>";
          echo "</form> </td>";
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
