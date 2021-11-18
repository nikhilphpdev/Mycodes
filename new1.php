<?php 
$n=5; 
  /*

*        *
**      **
***    ***
****  ****
**********
****  ****
***    ***
**      **
*        *



  */
  for($i=1; $i<=$n; $i++){
     for($j=1; $j<2*$n; $j++){
       if($j<=$i || $j>=2*$n-$i){
          echo"*";
       }else{
          echo"&nbsp;&nbsp;";
       }
     }
     echo"<br/>";
  }
   for($i=$n-1; $i>=1; $i--){
      for($j=1; $j<2*$n; $j++){
        if($j<=$i ||  $j>=2*$n-$i){
          echo"*";
        }else{
            echo"&nbsp;&nbsp;";
        }
      }
      echo"<br/>";
   }
   
?>