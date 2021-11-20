<?php
/*$severname='localhost';
$username='root';
$password='';
$dbname='modal';

$con= mysqli_connect($severname,$username,$password,$dbname);
if(!$con)
{
	die("conection failed:".mysqli_connect_error());
}
else
{
	//cho "connected";
}
*/
include'notorm/NotORM.php';
$db ="mysql:dbname=modal;host:localhost";
$con=new PDO($db,"root","");
$library=new notorm($con);
if(!$library){
	echo "connection failed";
}
else{
	//echo "connected";
}

?>