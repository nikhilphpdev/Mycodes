<?php
include'config.php';

if(isset($_POST['action']))
{  
   $name=$_POST['name'];
   $email=$_POST['email'];
    $id=$_POST['id'];

  $sql=$library->md[$id];
  $data= array(
        "name"=>$name,
       "email"=>$email   
     );
$result = $sql->update($data);
if($result==true)
{
  echo "success";
 
}
else{
  echo "failed";
}

}
?>