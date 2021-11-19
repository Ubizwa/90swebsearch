<?php

include "include.php";

$conn3 = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);



$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   $idcheck = $_GET['q'];

$testclicks = mysqli_query($conn3, "SELECT * FROM clicks WHERE ip = '".$ipaddress."' AND urlid = '".$idcheck."'");

if(mysqli_num_rows($testclicks) > 0)
{
    //exists
}
else
{
$SQL = $conn3->prepare("UPDATE search_engine SET click=click+1 WHERE id=?");

    $SQL->bind_param('s', $idcheck);
 $SQL->execute();
 $SQL->close();
 $conn3->close();
}

include "include.php";

$conn4 = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);




$SQL2 = $conn4->prepare("INSERT INTO clicks (urlid, ip) VALUES (?, ?)");
$SQL2->bind_param('ss', $idcheck, $ipaddress);



             $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];  







 $SQL2->execute();
 $SQL2->close();
 $conn4->close();






