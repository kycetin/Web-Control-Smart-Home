 <?php
 $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 0.5; URL=$url1");
 include('connect.php'); 
   
     $result = mysql_query("SELECT * FROM raspi ");
     
     while ($row = mysql_fetch_array($result))
     {
    $jsonString = file_get_contents('data.php');
$data = json_decode($jsonString, true);
$data['window'] = $row['window'];
$data['door'] = $row['door'];
$data['fan'] = $row['fan'];
$data['bulb'] = $row['bulb'];
$newJsonString = json_encode($data);
file_put_contents('data.php', $newJsonString);

}




    
    



    
?>
