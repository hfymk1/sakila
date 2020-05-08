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
        <input type="number" id="film_id" name="film_id" size=4
               padding=10px value="<?php echo $_POST["Get_ID"]; ?>" required="required"
               autofocus>
        <br/><br/>
        <label for="title">
          Title:
        </label>
        <input type="text" id="title" name="title" size=30
               padding=10px value="<?php echo $_POST["Get_title"]; ?>" required="required">
        <br/><br/>
        <label for="description">
          Description:
        </label><br/>
        <textarea id="description" name="description" row="20" cols="60" required>
          <?php echo $_POST["Get_text"]; ?>
        </textarea>
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
          $tname = "film_text";
          $val1 = $_GET["film_id"];
          $val2 = '"'.$_GET["title"].'"';
          $val3 = '"'.$_GET["description"].'"';
          $sql = "UPDATE ".$tname." SET title=".$val2.", description=".$val3.
          " WHERE film_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="filmtext.php";';
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
