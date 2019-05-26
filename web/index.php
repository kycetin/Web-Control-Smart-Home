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
    .table_titles{color:white;background-color:#69696A; text-align:center;font-size:23px}
    .rain{background-color:#FE0101; text-align:center;}
    .norain{background-color:yellow; text-align:center;}
    .value_temp{background-color:#C3C2C2; text-align:center;}
    .page{background-color:#69696A; height:100%; width:100%;}
    .text{text-align:center; color:#94092A; font-size:63px}
    .text2{text-align:center; color:#94092A; font-size:33px}
    .valueTable{text-align:center;color:#D2AC14;font-size:23px}
    .button{background-color:#129386; border:0px; height:55px ; font-weight: bold; color:#383838;font-size:23px}
    .warning{float:left; text-align:center; }
    .warnings{padding: 15px;}
</style>

      
</head>

    <body>
       
      
       
       
      <div class="page">
       <h1 class = 'text'>Webtek Proje</h1>
        
        
    <table align="center" class = "table"border="0" cellspacing="0" cellpadding="4">
      <tr>
           
           
            <td class="table_titles"><img src= "thermometer-2.png"></td>
            
          </tr>
          <tr class = "valueTable" float:left;> 
          
          
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
                $rainyWrite = "rain";
            }
        if  ($rainy == 1)
        {
            $rainyWrite = 'class = "norain"';
        }
        
       
       
        if ($doory == 1)
        {
            $dooryWrite = "Some one in front of Door ";
        }
        if ($doory == 0) 
        {
            $dooryWrite = "Door is safe";
        }
     
 if ($temperature > 35)
        {
            $value_temperature = "value_temp_high";
            
        }
        if ($temperature < 34)
        {
            
            $value_temperature = 'value_temp_low';
        }
       
        
    }
?>
       <td> <?php echo $temperature ;echo "°C"?></td>
         
          
          </tr>
     
           
    </table>
   <table align ="center" style='padding-top:55px' style='padding-bottom:55px'>
       <tr>
           <td>
<form  method="post">
    <button class ="button" style="width:auto " name="pencereac">OPEN WINDOW</button>
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
    <button class ="button" name="pencerekapa">CLOSE WINDOW</button>
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
    <button class ="button" name="doorclose">CLOSE DOOR</button>
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
    <button class ="button" name="dooropen">OPEN DOOR </button>
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
    <button class ="button" name="lighton">LIGHT ON </button>
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
    <button class ="button" name="lightoff">LIGHT OFF </button>
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
    <button  class ="button" name="fanon">FAN ON</button>
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
    <button class ="button" name="fanoff">FAN OFF </button>
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
<div>
    
    <table align="center" class = "table"border="0"  >
        <tr style='padding-top:55px'>
            <td> <?php 
            if($temperature >60 ) { echo '<img src="hot.png" ';}
             if($temperature <30  ) { echo '<img src="cold.png" ';}
             else  { echo '<img src="warm.png" ';} ?></td>
              
              <td> <?php 
            if($light < 200) { echo '<img src="sun.png" ';}
             else { echo '<img src="moon.png" ';}
              ?></td>
              
               <td> <?php 
            if($rainy == 0 ) { echo '<img src="rainbow.png" ';}
             else { echo '<img src="rain.png" ';}
              ?></td>
              
              
               <td> <?php 
            if($doory == 1 ) { echo '<img src="secure.png" ';}
             else { echo '<img src="thief.png" ';}
              ?></td>
           
        </tr>
        <tr class ="text2" >
            <td> <?php 
            if($temperature >60 ) { echo 'HOT';}
             if($temperature <30  ) { echo 'COLD ';}
             if($temperature <59 && $temperature > 31)  { echo 'WARM ';} ?></td>
              
              <td> <?php 
            if($light <200) { echo 'SUNNY DAY ';}
             else { echo 'MOON IS SHINING';}
              ?></td>
              
               <td> <?php 
            if($rainy == 0 ) { echo 'NO RAIN';}
             else { echo 'ROMANTIC RAIN ';}
              ?></td>
              
              
               <td> <?php 
            if($doory == 1) { echo 'DOOR IS SAFE ';}
             else { echo 'DOOR IS NOT SAFE SECURITY!!!';}
              ?></td>
            
        </tr>
    </table>
    
</div>
 
    </body>
</html>