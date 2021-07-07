<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<?php include_once 'header.php'; ?>
 
 <main class="container">
 <div class="row">
 
 <div class="col-md-8">
<?php
if($_COOKIE['login']==''):
?>
 <form>
 <div class="mb-3">
    <label for='login' class="form-label">Login</label>
    <input type="text" class="form-control" name='login'  id='login' aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for='password' class="form-label">Password</label>
    <input type="password" class="form-control" name='password' id='password' aria-describedby="emailHelp">
  </div>
  <div class="alert alert-danger mb-3" id='errorBlock'></div>
  <button type="button" id="authbtn" class="btn btn-primary">Увійти</button>
</form>
<?php else:?>
  <h2><?=$_COOKIE['login']?></h2>
  <button type="button" class="btn btn-danger" id="exitbtn">Exit</button>
<?php endif; ?>
 </div>

 <div class="col-md-4">

 </div>
 </div>
 </main>
<?php include_once('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#authbtn').click(function(){

 var login=$('#login').val();
 var password=$('#password').val();

$.ajax({
url: 'reg/auth.php',
type : 'POST',
cache: false,
data: {
'usLogin' : login,
'usPass' : password
},
dataType : 'html',
success : function(data){
  if(data=='Готово'){
    $('#authbtn').text('Ви увійшли');
    $('#errorBlock').hide();
document.location.reload(true);
  }else{
    $('#errorBlock').show();
    $('#errorBlock').text(data);
  }
}

});
})
 

$('#exitbtn').click(function(){

$.ajax({
url: 'reg/exit.php',
type : 'POST',
cache: false,
data: {},
dataType : 'html',
success : function(data){
   document.location.reload(true);
   }

});
})

</script>
</body>
</html>
