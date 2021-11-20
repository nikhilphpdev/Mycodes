
<!DOCTYPE html>
<html>
<head>
  <title>model</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#save1").click(function(){
        var name=$('#name1').val();
        var email=$('#email1').val();
          $('#tabe').append('<tr><td>'+$('#id').val()+'</td><td>'+$('#name').val()+'</td><td> '+$('#email').val()+'</td></tr>');       
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
               $('#id').val(response.id);
               $('#name').val(response.name);
               $('#email').val(response.email);

               
              }

        });              

      });
      });
    </script>
</head>
<body>
<div>
  <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#mymodal"> New Task</button>
  </div>
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
       
          <input type="button" name="save" id="save1" class="btn-primary" value="sunbmit">
          </form>
        <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
        
    </div>
  </div>
</body>
</html> 