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
          Category ID:
        </label>
        <input type="number" id="category_id" name="category_id" size=3 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>
        <label for="name">
          Category:
        </label>
        <input type="text" id="name" name="name" size=15
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
          $tname = "category";
          $val1 = $_GET["category_id"];
          $val2 = '"'.$_GET["name"].'"';
          $val3 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET name=".$val2.", last_update=".$val3.
                 " WHERE category_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="category.php";';
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
