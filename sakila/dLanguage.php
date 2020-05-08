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
    <a href="main.php">
      SAKILA
    </a>
  </div>
  <div class="topbar">

    <div class="dropdown">
      <div class="dropbtn" onclick="void(0)">
        View Attributes &nbsp <i class="arrow down"></i>
      </div>
      <div class="dropdown-content">
				<?php if(!((isset($_POST['Check1'])) or (isset($_POST['Check2'])) or (isset($_POST['Check3'])))){
                $_POST['Check1'] = "true";
                $_POST['Check2'] = "true";
                $_POST['Check3'] = "true";
				}
                ?>
				<form method="post" >
					   <input type="checkbox" name="Check1" <?php if(isset($_POST['Check1'])) echo "checked='checked'"; ?> /> <font color="white">Language ID</font><br>
					   <input type="checkbox" name="Check2" <?php if(isset($_POST['Check2'])) echo "checked='checked'"; ?> /> <font color="white">Name</font><br>
					   <input type="checkbox" name="Check3" <?php if(isset($_POST['Check3'])) echo "checked='checked'"; ?> /> <font color="white">Last Update</font><br><br>
					   <input type="submit" value="View">
		        </form>
      </div>
    </div>

    <a href="language.php" class="active"> Back </a>
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
    <p>Language</p>
    <?php
      $sql = "SELECT * FROM language";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
		if(isset($_POST['Check1']) or isset($_POST['Check2']) or isset($_POST['Check3'])){
			echo "<table border='1'>";
			echo "<tr>";
		}
		if(isset($_POST['Check1'])){
			echo "<th> Language ID </th>";
	    }
		if(isset($_POST['Check2'])){
			echo "<th> Name </th>";
	    }
		if(isset($_POST['Check3'])){
			echo "<th> Last Update </th>";
	    }
        echo "<th> Delete </th>";

        echo "</tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
		  if(isset($_POST['Check1'])){
				echo "<td>".$row["language_id"]."</td>";

		  }
		  if(isset($_POST['Check2'])){
				echo "<td>".$row["name"]."</td>";
		  }
		  if(isset($_POST['Check3'])){
				echo "<td>".$row["last_update"]."</td>";
		  }
		$Get_ID =$row["language_id"];
		 echo "<td> <form method='POST' ><input type='hidden' name='Get_ID' value='" .$row["language_id"] ."'><input type='submit' name='delete' value='Delete'> </form> </td>";
          echo "</tr>";
        }
        echo "</table>";
      }
      else {
        echo "0 results";
      }
	   if (isset($_POST["delete"])){
        $sql = "DELETE FROM language WHERE language_id =" . $_POST["Get_ID"];

      if ($conn->query($sql) === TRUE) {
        echo'<script type ="text/javascript">';
        echo 'alert("Record deleted successfully.");';
        echo 'window.location="dLanguage.php";';
        echo '</script>';
        mysqli_close($conn);
        exit;
    } else {
        echo "Error deleting record: " ; //. $conn->error
    }
    }
    ?>
  </div>


  <!-- Close MySQLi Connection -->
  <?php
    $conn->close();
  ?>

</body>
</html>
