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
      background-color: #333;
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
      margin-left: 49px;
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
	  color: white;
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
	th{
		text-align: center;
	}
	td{
		text-align: center;
	}

  </style>
</head>
<body>
  <div class="sakila">
    <a href="index.php">
      SAKILA
    </a>
  </div>
  <div class="topbar">

  <div class="dropdown">
      <div class="dropbtn" onclick="void(0)">
        View Attributes &nbsp <i class="arrow down"></i>
      </div>
      <div class="dropdown-content">

<?php if(!((isset($_POST['Check1'])) or (isset($_POST['Check2'])) or (isset($_POST['Check3'])) or (isset($_POST['Check4'])) or (isset($_POST['Check5'])) or (isset($_POST['Check6'])) or (isset($_POST['Check7'])))){
                $_POST['Check1'] = "true";
                $_POST['Check2'] = "true";
                $_POST['Check3'] = "true";
                $_POST['Check4'] = "true";
				$_POST['Check5'] = "true";
				$_POST['Check6'] = "true";
				$_POST['Check7'] = "true";
            }
                ?>

				<form method="post" >
					   <input type="checkbox" name="Check1" <?php if(isset($_POST['Check1'])) echo "checked='checked'"; ?> /> <font color="white">Address ID</font> <br>
					   <input type="checkbox" name="Check2" <?php if(isset($_POST['Check2'])) echo "checked='checked'"; ?> /> <font color="white">Address</font><br>
					   <input type="checkbox" name="Check3" <?php if(isset($_POST['Check3'])) echo "checked='checked'"; ?> /> <font color="white">District</font> <br>
					   <input type="checkbox" name="Check4" <?php if(isset($_POST['Check4'])) echo "checked='checked'"; ?> /> <font color="white">City ID</font><br>
					   <input type="checkbox" name="Check5" <?php if(isset($_POST['Check5'])) echo "checked='checked'"; ?> /> <font color="white">Postal Code</font><br>
					   <input type="checkbox" name="Check6" <?php if(isset($_POST['Check6'])) echo "checked='checked'"; ?> /> <font color="white">Phone Number</font> <br>
					   <input type="checkbox" name="Check7" <?php if(isset($_POST['Check7'])) echo "checked='checked'"; ?> /> <font color="white">Last Update</font><br><br>
					   <input type="submit" value="View">
		        </form>
      </div>
    </div>

    <div class="dropdown">
      <div class="dropbtn" onclick="void(0)">
        Query &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <i class="arrow down"></i>
      </div>
      <div class="dropdown-content">
        <a href="iAddress.php">Insert</a>
		<a href="dAddress.php">Delete</a>
		<a href="updateaddress.php">Update</a>
      </div>
    </div>
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
		if(isset($_POST['Check1']) or isset($_POST['Check2']) or isset($_POST['Check3']) or isset($_POST['Check4']) or isset($_POST['Check5']) or isset($_POST['Check6']) or isset($_POST['Check7'])){
			echo "<table border='1'>";
			echo "<tr>";
		}
        if(isset($_POST['Check1'])){
			echo "<th> Address ID </th>";
	    }
		if(isset($_POST['Check2'])){
			 echo "<th> Address </th>";
	    }
		if(isset($_POST['Check3'])){
			echo "<th> District </th>";
	    }
		if(isset($_POST['Check4'])){
			echo "<th> City ID </th>";
	    }
		if(isset($_POST['Check5'])){
			echo "<th> Postal Code </th>";
	    }
		if(isset($_POST['Check6'])){
			echo "<th> Phone Number </th>";
	    }
		if(isset($_POST['Check7'])){
			 echo "<th> Last Update </th>";
	    }

        echo "</tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
		  if(isset($_POST['Check1'])){
			echo "<td>".$row["address_id"]."</td>";
	      }
		  if(isset($_POST['Check2'])){
			echo "<td>".$row["address"]."</td>";
	      }
		  if(isset($_POST['Check3'])){
			echo "<td>".$row["district"]."</td>";
	      }
		  if(isset($_POST['Check4'])){
			echo "<td>".$row["city_id"]."</td>";
	      }
		  if(isset($_POST['Check5'])){
			echo "<td>".$row["postal_code"]."</td>";
	      }
		  if(isset($_POST['Check6'])){
			echo "<td>".$row["phone"]."</td>";
	      }
		  if(isset($_POST['Check7'])){
			  echo "<td>".$row["last_update"]."</td>";
	      }
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
