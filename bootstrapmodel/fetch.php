<?php
include'config.php';
	 
	$id=str_replace('update_', '', $_POST['id']);
    $sql=$library->md()->Where('id', $id);

foreach ($sql as  $row) {
	$rtrn['id']=$row['id'];
	$rtrn['name']=$row['name'];
	$rtrn['email']=$row['email'];

}
echo json_encode($rtrn);
exit();

?>
