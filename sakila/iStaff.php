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
      font-size: 120px;
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
	th{
		text-align: center;
	}
	td{
		text-align: center;
	}
	input[type=text], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=submit] {
		width: 100%;
		background-color: red;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=submit]:hover {
		background-color: #777;
		color: white
	}


	input[type=reset]{
		width: 10%;
		background-color: #444;
		color: white;
		padding: 7px 13px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=reset]:hover {
		background-color: #111;
		color: white
	}

	InsertForm {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
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
		 <a href="index.php" class="active"> Exit </a>
		  <a href="staff.php" > View Staff Table </a>
	</div>



	<div class="InsertForm">
		<form action="iStaff.php" method="post">
			<br><br><br>
			<label for="staff_id"><font color="white">Staff ID</font></label>
			<input type="text" id="staff_id" name="staff_id" placeholder="staff id..">

			<label for="fname"><font color="white">First Name</font></label>
			<input type="text" id="fname" name="fname" placeholder="staff first name..">

			<label for="lname"><font color="white">Last Name</font></label>
			<input type="text" id="lname" name="lname" placeholder="staff last name..">

			<label for="address_id"><font color="white">Address ID</font></label>
			<input type="text" id="address_id" name="address_id" placeholder="address id..">

			<label for="email"><font color="white">Email</font></label>
			<input type="text" id="email" name="email" placeholder="staff email address..">

			<label for="store_id"><font color="white">Store ID</font></label>
			<input type="text" id="store_id" name="store_id" placeholder="store id..">

			<label for="active"><font color="white">Active</font></label>
			<select id="active" name="active">
			<option value="1">active</option>
			<option value="0">inactive</option>
			</select>

			<label for="username"><font color="white">Username</font></label>
			<input type="text" id="username" name="username" placeholder="username..">

			<label for="password"><font color="white">Password</font></label>
			<input type="text" id="password" name="password" placeholder="password..">

			<input type="reset" value="Clear">
			<input type="submit" value="Submit">
		</form>
	</div>

	<?php
	error_reporting(E_ERROR | E_PARSE);
	$link = mysqli_connect("localhost", "hcyjn1_root", "dnigroupsupper", "hcyjn1_sakila");

	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	// Escape user inputs for security
	$staff_id= mysqli_real_escape_string($link, $_REQUEST['staff_id']);
	$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
	$address_id = mysqli_real_escape_string($link, $_REQUEST['address_id']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);
	$store_id = mysqli_real_escape_string($link, $_REQUEST['store_id']);
	$active = mysqli_real_escape_string($link, $_REQUEST['active']);
	$username = mysqli_real_escape_string($link, $_REQUEST['username']);
	$password = mysqli_real_escape_string($link, $_REQUEST['password']);

	// Attempt insert query execution
	$sql = "INSERT INTO staff(staff_id, first_name, last_name, address_id, email, store_id, active, username, password) VALUES ('$staff_id', '$fname', '$lname', '$address_id', '$email', '$store_id', '$active', '$username', '$password')";


	if(mysqli_query($link, $sql)){
		echo '<span style="color:#FFFFFF;">Records added successfully. </span>';
	} else{
		echo '<span style="color:#FFFFFF;">ERROR: Data not recorded</span>';
	}


	// Close connection
	mysqli_close($link);
	?>

</body>
</html>