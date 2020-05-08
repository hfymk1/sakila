<!DOCTYPE html>
<html>
  <head>
    <title> Update </title>
    <script type="text/javascript">
    </script>
  </head>
  <body>
    <h2> Update </h2>
    <div id="maintext">
      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">

        <label for="staff_id">
          Staff ID:
        </label>
        <input type="number" id="staff_id" name="staff_id" size=1 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>

        <label for="first_name">
          First Name:
        </label>
        <input type="text" id="first_name" name="first_name" size=20
               padding=10px value="<?php echo $_POST["Get_fname"]; ?>" required>
        <br/><br/>

        <label for="last_name">
          Last Name:
        </label>
        <input type="text" id="last_name" name="last_name" size=20
               padding=10px value="<?php echo $_POST["Get_lname"]; ?>" required>
        <br/><br/>

        <label for="address_id">
          Address ID:
        </label>
        <input type="number" id="address_id" name="address_id" size=3
               padding=10px value="<?php echo $_POST["Get_addID"]; ?>" required>
        <br/><br/>

        <label for="email">
          Email:
        </label>
        <input type="text" id="email" name="email" size=50
               padding=10px value="<?php echo $_POST["Get_email"]; ?>" required="required">
        <br/><br/>

        <label for="store_id">
          Store ID:
        </label>
        <input type="number" id="store_id" name="store_id" size=1
               padding=10px value="<?php echo $_POST["Get_storeID"]; ?>" required="required">
        <br/><br/>

        Active:<br/>
        <input type="radio" id="active" name="active" value="1">
          <label for="active"> Active </label><br>
        <input type="radio" id="inactive" name="active" value="0">
          <label for="inactive"> Inactive </label><br>
        <br/><br/>

        <label for="username">
          Username:
        </label>
        <input type="text" id="username" name="username" size=10
               padding=10px value="<?php echo $_POST["Get_uname"]; ?>" required="required">
        <br/><br/>

        <label for="password">
          Password:
        </label>
        <input type="text" id="password" name="password" size=50
               padding=10px value="<?php echo $_POST["Get_pw"]; ?>">
        <br/><br/>

        <label for="last_update">
          Last Update:
        </label>
        <input type="datetime" id="last_update" name="last_update" padding=10px
               value="<?php date_default_timezone_set("Singapore");
               echo date("Y-m-d h:i:s"); ?>">
        <br/><br/>

        <input type="submit">
      </form>
    </div>


    <div id="resultbox">
      <?php
        $servername = "localhost";
        $username = "hcyjn1_root";
        $password = "dnigroupsupper";
        $db = "hcyjn1_sakila";

        $conn = new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
          die("Connection failed: ".$conn->connect_error);
        }

        $val1=$val2=$val3=$val4=$val5=$val6=$val7=$val8=$val9=$val10="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "staff";
          $val1 = $_GET["staff_id"];
          $val2 = '"'.$_GET["first_name"].'"';
          $val3 = '"'.$_GET["last_name"].'"';
          $val4 = $_GET["address_id"];
          $val5 = '"'.$_GET["email"].'"';
          $val6 = $_GET["store_id"];
          $val7 = $_GET["active"];
          $val8 = '"'.$_GET["username"].'"';
          $val9 = '"'.$_GET["password"].'"';
          $val10 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET first_name=".$val2.
                 ", last_name=".$val3.", address_id=".$val4.
                 ", email=".$val5.", store_id=".$val6.", active=".$val7.
                 ", username=".$val8.", password=".$val9.", last_update=".$val10.
                 " WHERE staff_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="staff.php";';
            echo '</script>';
            mysqli_close($conn);
            exit;
          }
        }

        $conn->close();
      ?>
    </div>
  </body>
</html>
