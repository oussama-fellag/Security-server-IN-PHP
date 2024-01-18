<?php

$dsn = "mysql:host=localhost;dbname= test";
$dbusername = "root";   //security 04 : dont let password public in code or share it
$dbpassword = "";


try {
    $pdo =  new PDO($dsn , $dbusername , $dbpassword); //security 05: sql injection while connecting to SQL
 $pdo -> setAttrbute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e.getMessage();
}
?>


// this is all