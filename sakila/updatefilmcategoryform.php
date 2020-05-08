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
               value="<?php echo $_POST["Get_catID"]; ?>" required="required" autofocus>
        <br/><br/>
        <label for="film_id">
          Film ID:
        </label>
        <input type="number" id="film_id" name="film_id" size=4
               padding=10px value="<?php echo $_POST["Get_filmID"]; ?>" required="required">
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
          $tname = "film_category";
          $val1 = $_GET["category_id"];
          $val2 = $_GET["film_id"];
          $val3 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET film_id=".$val2.", last_update=".$val3.
                 " WHERE category_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="filmcategory.php";';
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
