<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tei";

$conn = mysqli_connect($servername,$username,$password ,$dbname);

if($conn)
{
	echo "Connection Succesfully";
}
else
{
	echo " COnnection Failed ";
}


?>