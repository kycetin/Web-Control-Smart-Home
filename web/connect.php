<?php
    $username="username";
    $password="password";
    $sunucu="localhost";
    $database=database name";
    
    $baglan=mysql_connect($sunucu,$username,$password);
    mysql_query("SET NAMES UTF8");
    
    if(!$baglan)
    {
        echo "Bağlantı hatası: ".mysql_errno();
        exit();
        
    }
    $db=mysql_select_db($database);
    if(!$database) {echo "Veritabanı hatası: ".mysql_error();echo "</br>";
        echo "Veritabanı bağlantı bilgilerini baglan.php dosyasından düzenleyebilirsiniz";
        exit();
    }
    ?>﻿
