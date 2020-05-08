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
        <label for="category_id">
          Language ID:
        </label>
        <input type="number" id="language_id" name="language_id" size=1 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>
        <label for="name">
          Language:
        </label>
        <input type="text" id="name" name="name" size=10
               padding=10px value="<?php echo $_POST["Get_name"]; ?>" required="required">
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
          $tname = "language";
          $val1 = $_GET["language_id"];
          $val2 = '"'.$_GET["name"].'"';
          $val3 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET name=".$val2.", last_update=".$val3.
          " WHERE language_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="language.php";';
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
