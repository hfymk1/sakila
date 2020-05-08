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

        <label for="address_id">
          Address ID:
        </label>
        <input type="number" id="address_id" name="address_id" size=3 padding=10px
               value="<?php echo $_POST["Get_addID"]; ?>" required="required" autofocus>
        <br/><br/>

        <label for="address">
          Address:
        </label>
        <input type="text" id="address" name="address" size=40
               padding=10px value="<?php echo $_POST["Get_add"]; ?>" required="required">
        <br/><br/>

        <label for="address2">
          Address2:
        </label>
        <input type="text" id="address2" name="address2" size=30
               padding=10px value="<?php echo $_POST["Get_add2"]; ?>">
        <br/><br/>

        <label for="district">
          District:
        </label>
        <input type="text" id="district" name="district" size=30
               padding=10px value="<?php echo $_POST["Get_dist"]; ?>">
        <br/><br/>

        <label for="city_id">
          City ID:
        </label>
        <input type="number" id="city_id" name="city_id" size=3
               padding=10px value="<?php echo $_POST["Get_cityID"]; ?>" required="required">
        <br/><br/>

        <label for="postal_code">
          Postal Code:
        </label>
        <input type="number" id="postal_code" name="postal_code" size=5
               padding=10px value="<?php echo $_POST["Get_postal"]; ?>">
        <br/><br/>

        <label for="phone">
          Phone:
        </label>
        <input type="number" id="phone" name="phone" size=20
               padding=10px value="<?php echo $_POST["Get_phone"]; ?>">
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

        $val1=$val2=$val3=$val4=$val5=$val6=$val7=$val8="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "address";
          $val1 = $_GET["address_id"];
          $val2 = '"'.$_GET["address"].'"';
          $val3 = '"'.$_GET["address2"].'"';
          $val4 = '"'.$_GET["district"].'"';
          $val5 = $_GET["city_id"];
          $val6 = $_GET["postal_code"];
          $val7 = $_GET["phone"];
          $val8 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET address=".$val2.", address2=".$val3.
                 ", district=".$val4.", city_id=".$val5.", postal_code=".$val6.
                 ", phone=".$val7.", last_update=".$val8.
                 " WHERE address_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="address.php";';
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
