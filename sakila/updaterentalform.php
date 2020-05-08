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

        <label for="rental_id">
          Rental ID:
        </label>
        <input type="number" id="rental_id" name="rental_id" size=5 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>

        <label for="inventory_id">
          Inventory ID:
        </label>
        <input type="number" id="inventory_id" name="inventory_id" size=5
               padding=10px value="<?php echo $_POST["Get_invID"]; ?>" required>
        <br/><br/>

        <label for="customer_id">
          Customer ID:
        </label>
        <input type="number" id="customer_id" name="customer_id" size=3
               padding=10px value="<?php echo $_POST["Get_custID"]; ?>" required="required">
        <br/><br/>

        <label for="staff_id">
          Staff ID:
        </label>
        <input type="number" id="staff_id" name="staff_id" size=1
               padding=10px value="<?php echo $_POST["Get_staffID"]; ?>" required="required">
        <br/><br/>

        <label for="rental_date">
          Rental Date:
        </label>
        <input type="datetime" id="rental_date" name="rental_date"
               value="<?php echo $_POST["Get_rentdate"]; ?>" padding=10px>
        <br/><br/>

        <label for="return_date">
          Return Date:
        </label>
        <input type="datetime" id="return_date" name="return_date"
               value="<?php echo $_POST["Get_rdate"]; ?>" padding=10px>
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

        $val1=$val2=$val4=$val5=$val6=$val7="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "rental";
          $val1 = $_GET["rental_id"];
          $val2 = $_GET["inventory_id"];
          $val3 = $_GET["customer_id"];
          $val4 = $_GET["staff_id"];
          $val5 = '"'.$_GET["rental_date"].'"';
          $val6 = '"'.$_GET["return_date"].'"';
          $val7 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET inventory_id=".$val2.
                 ", customer_id=".$val3.", staff_id=".$val4.
                 ", rental_date=".$val5.", return_date=".$val6.", last_update=".$val7.
                 " WHERE rental_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="rental.php";';
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
