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
        <label for="actor_id">
          Actor ID:
        </label>
        <input type="number" id="actor_id" name="actor_id" size=3 padding=10px
              value="<?php echo $_POST["Get_ID"]; ?>"  required="required" autofocus>
        <br/><br/>
        <label for="first_name">
          First Name:
        </label>
        <input type="text" id="first_name" name="first_name" size=20
               padding=10px value="<?php echo $_POST["Get_fname"]; ?>" required="required">
        <br/><br/>
        <label for="last_name">
          Last Name:
        </label>
        <input type="text" id="last_name" name="last_name" size=20
               padding=10px value="<?php echo $_POST["Get_lname"]; ?>" required="required">
        <br/><br/>
        <label for="last_update">
          Date:
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

        $val1=$val2=$val3=$val4="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "actor";
          $val1 = $_GET["actor_id"];
          $val2 = '"'.$_GET["first_name"].'"';
          $val3 = '"'.$_GET["last_name"].'"';
          $val4 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET first_name=".$val2.", last_name=".$val3.", last_update=".$val4.
          " WHERE actor_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="actor.php";';
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
