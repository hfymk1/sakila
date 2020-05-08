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

        <label for="customer_id">
          Customer ID:
        </label>
        <input type="number" id="customer_id" name="customer_id" size=3 padding=10px
               value="<?php echo $_POST["Get_ID"]; ?>" required="required" autofocus>
        <br/><br/>

        <label for="store_id">
          Store ID:
        </label>
        <input type="number" id="store_id" name="store_id" size=1
               padding=10px value="<?php echo $_POST["Get_store"]; ?>" required="required">
        <br/><br/>

        <label for="first_name">
          First Name:
        </label>
        <input type="text" id="first_name" name="first_name" size=20
               padding=10px value="<?php echo $_POST["Get_fname"]; ?>" required>
        <br/><br/>

        <label for="last_name">
          Last Name:
        </label>
        <input type="text" id="last_name" name="last_name" size=20
               padding=10px value="<?php echo $_POST["Get_lname"]; ?>" required>
        <br/><br/>

        <label for="email">
          Email:
        </label>
        <input type="text" id="email" name="email" size=50
               padding=10px value="<?php echo $_POST["Get_email"]; ?>" required="required">
        <br/><br/>

        <label for="address_id">
          Address ID:
        </label>
        <input type="number" id="address_id" name="address_id" size=3
               padding=10px value="<?php echo $_POST["Get_addID"]; ?>" required>
        <br/><br/>

        Active:<br/>
        <input type="radio" id="active" name="active" value="1">
          <label for="active"> Active </label><br>
        <input type="radio" id="inactive" name="active" value="0">
          <label for="inactive"> Inactive </label><br>
        <br/><br/>

        <label for="create_date">
          Create Date:
        </label>
        <input type="datetime" id="create_date" name="create_date" padding=10px
               value="<?php echo $_POST["Get_cdate"]; ?>"
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

        $val1=$val2=$val3=$val4=$val5=$val6=$val7=$val8=$val9="";

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
          $tname = "customer";
          $val1 = $_GET["customer_id"];
          $val2 = $_GET["store_id"];
          $val3 = '"'.$_GET["first_name"].'"';
          $val4 = '"'.$_GET["last_name"].'"';
          $val5 = '"'.$_GET["email"].'"';
          $val6 = $_GET["address_id"];
          $val7 = $_GET["active"];
          $val8 = '"'.$_GET["create_date"].'"';
          $val9 = '"'.$_GET["last_update"].'"';
          $sql = "UPDATE ".$tname." SET store_id=".$val2.", first_name=".$val3.
                 ", last_name=".$val4.", email=".$val5.", address_id=".$val6.
                 ", active=".$val7.", create_date=".$val8.", last_update=".$val9.
                 " WHERE customer_id LIKE ".$val1.";";
          $result = $conn->query($sql);


          if ($conn->query($sql) === TRUE) {
            echo'<script type ="text/javascript">';
            echo 'alert("Record Updated successfully.");';
            echo 'window.location="customer.php";';
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
