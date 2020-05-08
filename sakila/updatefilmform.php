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

      <label for="film_id">
        Film ID:
      </label>
      <input type="number" id="film_id" name="film_id" size=4 padding=10px
             value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
      <br/><br/>

      <label for="title">
        Title:
      </label>
      <input type="text" id="title" name="title" size=30
             padding=10px value="<?php echo $_POST["Get_title"]; ?>" required="required">
      <br/><br/>

      <label for="year">
        Release Year:
      </label>
      <input type="text" id="year" name="year" size=4
             padding=10px value="<?php echo $_POST["Get_year"]; ?>" required>
      <br/><br/>

      <label for="language_id">
        Language:
      </label>
      <input type="number" id="language_id" name="language_id" size=1
             padding=10px value="<?php echo $_POST["Get_lang"]; ?>" required="required">
      <br/><br/>

      <label for="rental_duration">
        Rental Duration:
      </label>
      <input type="number" id="rental_duration" name="rental_duration" size=1
             padding=10px value="<?php echo $_POST["Get_duration"]; ?>" required="required">
      <br/><br/>

      <label for="rental_rate">
        Rental Rate:
      </label>
      <input type="number" id="rental_rate" name="rental_rate" size=10
             padding=10px value="<?php echo $_POST["Get_rate"]; ?>" required="required">
      <br/><br/>

      <label for="length">
        Length:
      </label>
      <input type="number" id="length" name="length" size=3
             padding=10px value="<?php echo $_POST["Get_length"]; ?>" required="required">
      <br/><br/>

      <label for="replacement_cost">
        Replacement Cost:
      </label>
      <input type="number" id="replacement_cost" name="replacement_cost"
             size=10 padding=10px value="<?php echo $_POST["Get_replacement"]; ?>" required="required">
      <br/><br/>

      <label for="rating">
        Rating:
      </label>
      <input type="text" id="rating" name="rating" size=5
             padding=10px value="<?php echo $_POST["Get_rating"]; ?>" required>
      <br/><br/>

      <label for="special_features">
        Special Features:
      </label>
      <input type="text" id="special_features" name="special_features" size=30
             padding=10px value="<?php echo $_POST["Get_feat"]; ?>" required>
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

        $val1=$val2=$val4=$val5=$val6=$val7=$val8=$val9=$val10=$val11=$val12=$val13="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "film";
          $val1 = $_GET["film_id"];
          $val2 = '"'.$_GET["title"].'"';
          $val4 = '"'.$_GET["year"].'"';
          $val5 = $_GET["language_id"];
          $val7 = $_GET["rental_duration"];
          $val8 = $_GET["rental_rate"];
          $val9 = $_GET["length"];
          $val10 = $_GET["replacement_cost"];
          $val11 = '"'.$_GET["rating"].'"';
          $val12 = '"'.$_GET["special_features"].'"';
          $val13 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET title=".$val2.
                 ", release_year=".$val4.", language_id=".$val5.
                 ", rental_duration=".$val7.", rental_rate=".$val8.", length=".$val9.
                 ", replacement_cost=".$val10.", rating=".$val11.", special_features=".$val12.
                 ", last_update=".$val13." WHERE film_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="film.php";';
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
