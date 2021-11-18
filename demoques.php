<?php 
$n=5;
   for($i=1; $i<=$n; $i++){
   	   for($j=1; $j<2*$n; $j++){
   	   	if($j<=$i || $j>=(2*$n)-$i){
   	   		echo"*";
   	   	}else if($i==$n){
   	   		 echo"&";
   	   	}else{
   	   		echo"&nbsp;&nbsp;";
   	   	}
   	   }
   	   echo"<br/>";
   }
?>