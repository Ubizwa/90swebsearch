<?php

include "include.php";

$conn65 = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


   $idcheckrand = $_GET['intr'];
    $ip3 = $_SERVER['HTTP_X_FORWARDED_FOR'];  

$SQLrand = $conn65->prepare("INSERT INTO surpriseclick (id, ip) VALUES (?, ?)");
$SQLrand->bind_param('ss', $idcheckrand, $ip3);



 $SQLrand->execute();
 $SQLrand->close();
 $conn65->close();

location.reload(true);





