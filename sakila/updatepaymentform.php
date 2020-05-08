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

        <label for="payment_id">
            Payment ID:
          </label>
          <input type="number" id="payment_id" name="payment_id" size=5 padding=10px
                 value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
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

          <label for="rental_id">
            Rental ID:
          </label>
          <input type="number" id="rental_id" name="rental_id" size=5
                 padding=10px value="<?php echo $_POST["Get_rentalID"]; ?>">
          <br/><br/>

          <label for="amount">
            Amount:
          </label>
          <input type="number" id="amount" name="amount" size=10
                 padding=10px value="<?php echo $_POST["Get_amount"]; ?>">
          <br/><br/>

          <label for="payment_date">
            Payment Date:
          </label>
          <input type="datetime" id="payment_date" name="payment_date"
                 value="<?php echo $_POST["Get_pdate"]; ?>" padding=10px>
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
          $tname = "payment";
          $val1 = $_GET["payment_id"];
          $val2 = $_GET["customer_id"];
          $val3 = $_GET["staff_id"];
          $val4 = $_GET["rental_id"];
          $val5 = $_GET["amount"];
          $val6 = '"'.$_GET["payment_date"].'"';
          $val7 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET customer_id=".$val2.
                 ", staff_id=".$val3.", rental_id=".$val4.
                 ", amount=".$val5.", payment_date=".$val6.", last_update=".$val7.
                 " WHERE payment_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="payment.php";';
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
