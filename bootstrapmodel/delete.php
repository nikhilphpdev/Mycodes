<?php
include'config.php';
 if(isset($_POST['action']))
 {

 	$id=$_POST['id'];
	$sql = $library->md[$id];
 $result=$sql->delete();
 if($result== true)
{
	echo "success";
	//header("location:profile.php");
}
else
{
	echo "noooooo";
}

}

?>