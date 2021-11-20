<?php

include'config.php';
 if(isset($_POST['action']))
 {
 	$name=$_POST['name'];
 	$email=$_POST['email'];
 	//print_r($_POST);
 	/*$sql="INSERT INTO `md`(`id`, `name`, `email`) VALUES ('','$name','$email')";
 	$result=mysqli_query($con,$sql);
 	if(!$result)
 	{
 		echo "sorry";
 	}
 	else
 	{
 		echo "insert";
	 	}*/
	 $sql = $library->md();
	$data = array(
	 "name"=> $name,
	 "email"=> $email
	 );
	$result=$sql->insert($data);
	if($result==true)
	{
		echo json_encode($result);
	}
	else{
		echo "nooooooooo";

	 }
	}

?>