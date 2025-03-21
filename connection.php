<?php
   $db_server = "localhost";
    $db_user = "edesiri";
    $db_password = "1234";
    $db_name = "exclusiverestaurant_db";
    $conn = "";

   try{
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
      }
   catch(mysqli_sql_exception){
    echo"Could not connect";
      }

?>