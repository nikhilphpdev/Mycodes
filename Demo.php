<?php
/*


*
**
***
****
*****
****
***
**
*


*/
$n=5;
  for($i=1; $i<=$n; $i++){
  	 for($j=1; $j<=$i; $j++){
  	 	echo"*";
  	 }
  	 echo"<br/>";
  }
  for($i=$n-1; $i>=1; $i--){
  	 for($j=1; $j<=$i; $j++){
  	 	echo"*";
  	 }
  	 echo"<br/>";
  }
  echo"<br/>";
  echo"<br/>";
  /*************Second*****************************/
/*


    *
   **
  ***
 ****
*****
 ****
  ***
   **
    *


*/


  for($i=1; $i<=$n; $i++){
  	 for($j=1; $j<=$n; $j++){
  	 	if($j<=($n-$i)){
             echo"&nbsp;&nbsp;";
  	 	}else{
  	 		echo"*";
  	 	}
  	 }
  	 echo"<br/>";
  }
  for($i=$n-1; $i>=1; $i--){
  	 for($j=1; $j<=$n; $j++){
  	 	 if($j>=$n-($i-1)){
  	 	 	 echo"*";
  	 	 }else{
  	 	 	echo"&nbsp;&nbsp;";
  	 	 }
  	 }
  	 echo"<br/>";
  }
echo"<br/>";
echo"<br/>";


?>