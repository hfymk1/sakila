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

        <label for="country_id">
          Country ID:
        </label>
        <input type="number" id="country_id" name="country_id" size=3 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>
        <label for="country">
          Country:
        </label>
        <input type="text" id="country" name="country" size=12
               padding=10px value="<?php echo $_POST["Get_country"]; ?>" required="required">
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

        $val1=$val2=$val3="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "country";
          $val1 = $_GET["country_id"];
          $val2 = '"'.$_GET["country"].'"';
          $val3 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET country=".$val2.", last_update=".$val3.
                 " WHERE country_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="country.php";';
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
