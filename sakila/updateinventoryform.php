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
        <label for="inventory_id">
          Inventory ID:
        </label>
        <input type="number" id="inventory_id" name="inventory_id" size=4 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>
        <label for="film_id">
          Film ID:
        </label>
        <input type="number" id="film_id" name="film_id" size=4
               padding=10px value="<?php echo $_POST["Get_filmID"]; ?>" required="required">
        <br/><br/>
        <label for="store_id">
          Store ID:
        </label>
        <input type="number" id="store_id" name="store_id" size=1
               padding=10px value="<?php echo $_POST["Get_storeID"]; ?>" required="required">
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
          $tname = "inventory";
          $val1 = $_GET["inventory_id"];
          $val2 = $_GET["film_id"];
          $val3 = $_GET["store_id"];
          $val4 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET film_id=".$val2.", store_id=".$val3.", last_update=".$val4.
          " WHERE inventory_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="inventory.php";';
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
