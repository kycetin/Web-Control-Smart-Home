<?php
    // Connect to MySQL
    include("connect.php");

    // Prepare the SQL statement
    
    
    $SQL = "INSERT INTO cetinkay_webtek.webtek (temp,light,rain,door) VALUES ('".$_GET["temp"]."','".$_GET["light"]."','".$_GET["rain"]."','".$_GET["door"]."')";     
       
    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("Location: index.php");
?>