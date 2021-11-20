<?php
include'config.php';
	$sql=$library->md();
?>
<!DOCTYPE html>		
<html>
<head>
	<title>GET| data</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function(){	
        $(document).on('click','#save1',function(){
        var name=$('#name1').val();
        var email=$('#email1').val();
          	 var id =$('#hiid').val();
        var pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
        var vaild =email.match(pattern);

        var datastr='action=insert_data &name='+name+'&email='+email+'';
        if(name==0)
        {
          $('.error').show();
          setTimeout(function(){ $(".error").hide(); }, 3000);
          return false;
        }
        if(vaild==null)
        {
          $(".error1").text('Enter vaild Emailid example: exaple@gmail.com');
          $(".error1").show();
          setTimeout(function(){$(".error1").hide();},3000);
          return false;
        }
        $.ajax({
              
                 'type':'POST',
                 'url' :'minsert.php',
                 'data':datastr,
             'dataType': 'JSON',
              success:function(response){
               $('#mymodal').modal('hide');
               $('#insert_data')[0].reset();
              var name= $('#id').val(response.id);
         var name=      $('#name').val(response.name);
               $('#email').val(response.email);
                   var iid= $('#id').val()
          $('#tabe').append('<tr><td>'+$('#id').val()+'</td><td>'+$('#name').val()+'</td><td>'+$('#email').val()+'</td><td><a href="#" id="update_'+iid+'" class="update btn btn-primary" data-toggle="modal"  data-target="#Modal"> Update</a>'+'<a href="#" id="'+iid+'" class="delete btn btn-warning"  data-target="#Modal"> delete</a></td></tr>');
               
                   
              }

        });              

  });
 
		$(document).on('click','.update',function(){
			var id =$(this).attr("id");
			var datastr='action=fetch_data&id='+id+'';
		$.ajax({
			 'type':'POST',
			 'url' :'fetch.php',
			 'data':datastr,
			 'dataType': 'JSON',
			 success:function(response){
				console.log(response);
				$('#name').val(response.name);
				$('#email').val(response.email);
				$('#hiid').val(response.id);
			},
	});
});

		$("#update1").click(function(){
		 var id =$('#hiid').val();
		 var name=$("#name").val();
		 var email=$("#email").val();
		 var datastr ='action=update_data&name='+name+'&email='+email+'&id='+id+'';
		 $.ajax({
		 	'type':'POST',
		     'url':'update.php',
		     'data':datastr,
		     success:function(response){
		     	//if(response='success'){
		     		$('#Modal').modal('hide');
		     		$('#update_'+id).parent().prev().text(email);
		     	  	$('#update_'+id).parent().prev().prev().text(name);
		     	//}
                   // $('#id').parent().prev().text(email);
		     		//$('#id').parent().prev().prev().text(name);
		     }
     });
 });
		$(".delete").click(function(){

		  var id =$(this).attr("id");
		  var parent = $(this).parent("td").parent("tr");
		  var datastr ='action=dalete_data&name=&id='+id+'';
			$.ajax({
				 'type':'POST',
				 'url':'delete.php',
				 'data':datastr,
				 success:function(response){
			        parent.remove();
			        
			      }

     });
 
  });

 });
	</script>
	
       
</head>
<body>
<form>
	<div class="container">
  <h2 class="text-center"> Profile</h2>
<div class="table-responsive">
<button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#mymodal"> New Task</button>
<table class="table table-striped " id="tabe" width="100%">
<tr>
   <th>id</th>
	<th>email</th>
	<th>Email</th>
	<th>Action</th>
	</tr>
	<?php
	
		foreach($sql as $row)
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo"<td>".$row['email']."</td>";
        echo  '<td><a href="#"id="update_' . $row['id'] . '" class="update btn btn-primary" data-toggle="modal" data-target="#Modal"  >update</a>'.' ';
        echo '<a href="#" id="' . $row['id'] . '" class="delete btn btn-warning"  data-target="#Modal"> delete</a></td>';
         echo "</tr>";
         
	}
        
	?>
</table>
</div>
</div>
</body>
</html>	
 
 <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update form</h4>
        </div>
      <form role="form">
        <div class="form-group">
          <label>Name:</label>
          
          <input type="text" name="name" id="name"  class="form-control" >
          <span class="error" style="color: red; display: none;"> Enter name</span>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="text" name="email" id="email"  class="form-control">
          <span class="error1" style="color: red; display: none;"></span>
        </div>
        <input type="hidden" name="hidden" id="hiid"  class="form-control">
          <input type="button" name="update1" id="update1" class="update1 btn-primary" value="update1">
        </form>
        <div class="modal-footer">
          	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      	
    </div>
  </div>
 

  <!----------------------insert---------------->

  <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
     
          <h4 class="modal-title">Register Modal</h4>
        </div>
        <form method="post" id="insert_data">
        <div class="modal-body">
          <label>Name:</label>
          <input type="text" name="name" id="name1" class="form-control" >
          <span class="error" style="color: red; display: none;"> Enter name</span>
        </div>
        <div class="modal-body">
          <label>Email:</label>
          <input type="text" name="email" id="email1" class="form-control">
          <span class="error1" style="color: red; display: none;"></span>
        </div>
       <input type="hidden" name="hidde" id="id"  class="form-control">
          <input type="button" name="save" id="save1" class="btn-primary" value="sunbmit">
          </form>
        <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
        
    </div>
  </div>