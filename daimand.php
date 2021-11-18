<?php 
/* 
    *        
   ***      
  *****    
 *******  
*********
 *******  
  *****    
   ***     
    *        

*/
$n=5;
   
   for($i=1; $i<=$n; $i++){
   	 for($j=1; $j<=(2*$n)-1; $j++){
   	 	if($j>=$n-($i-1) && $j<=$n+($i-1)){
   	 		echo"*";
   	 	}else{
   	 		echo"&nbsp;&nbsp;";
   	 	}
   	 }
   	 echo"<br/>";
   }
   for($i=$n-1; $i>=1; $i--){
   	  for($j=1; $j<=(2*$n)-1; $j++){
   	  	 if($j>=$n-($i-1) && $j<=$n+($i-1)){
   	  	 	echo"*";
   	  	 }else{
   	  	 	   echo"&nbsp;&nbsp;";
   	  	 }
   	  }
   	  echo"<br/>";
   }


?>
