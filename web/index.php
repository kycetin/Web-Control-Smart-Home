<?php 
    // Start MySQL Connection
     $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 5; URL=$url1");
    include('connect.php'); 


?>

<html>
<head>
  
    <title >Webtek Proje</title>

<style>
    .table_titles{background-color:gray; text-align:center;}
    .value_temp_high{background-color:#FE0101; text-align:center;}
    .value_temp_low{background-color:#01A1FE; text-align:center;}
    .value_temp{background-color:#C3C2C2; text-align:center;}
    .page{background-color:white;}
    .text{color:#A62323;}
</style>

      
</head>

    <body>
        <div class = "page">
        <h1 class = "text">Webtek Proje</h1>
        <h1></h1>

    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
           
           
            <td class="table_titles">Temperature</td>
            <td class="table_titles">Light</td>
            <td class="table_titles">Rain</td>
            <td class="table_titles">Door</td>
          </tr>
          <tr float:left;> 
          
          
          <?php


    // Retrieve all records and display them
    $result = mysql_query("SELECT * FROM webtek ");

    // Used for row color toggle
   

    // process every record
    while( $row = mysql_fetch_array($result) )
    {
       
        $temperature = $row["temp"];
        $light = $row["light"];
         $rainy = $row["rain"];
          $doory = $row["door"];
         if ($rainy == 0)
            {
                $rainyWrite = "no rain";
            }
        if  ($rainy == 1)
        {
            $rainyWrite = "rain";
        }
        
       
       
        if ($doory == 1)
        {
            $dooryWrite = "Some one in front of Door ";
        }
        if ($doory == 0) 
            $dooryWrite = "Door is safe";
        if ($temperature > 35)
        {
            $value_temperature = "value_temp_high";
        }
        if ($temperature < 34)
        {
            $value_temperature = 'class ="value_temp_low"';
        }
        
    }
?>
          <td class = ".$value_temperature"  > <?php echo $temperature ;?></td>
          <td class = "value_light"> <?php echo $light ;?> </td>
          <td class = "value_rain"> <?php echo $rainyWrite ;?></td>
          <td class = "value_door">  <?php echo $dooryWrite ;?> </td>
          
          </tr>
     
           
    </table>
   <table>
       <tr>
           <td>
<form method="post">
    <button name="pencereac">pencere ac</button>
</form>

   <?php
    if(isset($_POST['pencereac'])){
 include("connect.php");

// Create connection

$windowCond = "PENCERE ACILDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (window) VALUES ('0')";     

mysql_query($SQL);
    }
    
    ?>
</td>
<td>
<form method="post">
    <button name="pencerekapa">pencere kapa</button>
</form>

   <?php
    if(isset($_POST['pencerekapa'])){
 include("connect.php");

// Create connection


$SQL = "INSERT INTO cetinkay_webtek.raspi (window) VALUES ('1')";     
$windowCond = "PENCERE KAPANDI";
mysql_query($SQL);
    }
    ?>
</td>
<td>
<form method="post">
    <button name="doorclose">CLOSE DOOR</button>
</form>

   <?php
    if(isset($_POST['doorclose'])){
 include("connect.php");

// Create connection


$SQL = "INSERT INTO cetinkay_webtek.raspi (door) VALUES ('0')";     
$doorCond = "KAPI KAPANDI";
mysql_query($SQL);
    }
    ?>
    
 </td>
 <td>
    <form method="post">
    <button name="dooropen">OPEN DOOR </button>
</form>

   <?php
    if(isset($_POST['dooropen'])){
 include("connect.php");

// Create connection

$doorCond = "KAPI ACILDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (door) VALUES ('1')";     

mysql_query($SQL);
    }
    ?>
</td>
<td>
   <form method="post">
    <button name="lighton">LIGHT ON </button>
</form>

   <?php
    if(isset($_POST['lighton'])){
 include("connect.php");

// Create connection

$lightCond = "ISIK ACILDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (bulb) VALUES ('1')";     

mysql_query($SQL);
    }
    ?>
</td>
<td>
   <form method="post">
    <button name="lightoff">LIGHT OFF </button>
</form>

   <?php
    if(isset($_POST['lightoff'])){
 include("connect.php");

// Create connection

$lightCond = "ISIK KAPANDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (bulb) VALUES ('0')";     

mysql_query($SQL);
    }
    ?>
  </td>
  <td>
       <form method="post">
    <button name="fanon">FAN ON</button>
</form>

   <?php
    if(isset($_POST['fanon'])){
 include("connect.php");

// Create connection

$lightCond = "FAN ACILDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (fan) VALUES ('1')";     

mysql_query($SQL);
    }
    ?>

</td>
<td>
   <form method="post">
    <button name="fanoff">FAN OFF </button>
</form>

   <?php
    if(isset($_POST['fanoff'])){
 include("connect.php");

// Create connection

$lightCond = "FAN KAPANDI";
$SQL = "INSERT INTO cetinkay_webtek.raspi (fan) VALUES ('0')";     

mysql_query($SQL);
    }
    ?>
    </td>
    </tr>
</table>
</div>
 
    </body>
</html>