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

 <form>
  <div class="mb-3">
    <label for='name' class="form-label">Name</label>
    <input type="text" class="form-control" name='name' id='name' aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for='login' class="form-label">Login</label>
    <input type="text" class="form-control" name='login'  id='login' aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" name='mail'  id='mail'>
  </div>
  <div class="mb-3">
    <label for='password' class="form-label">Password</label>
    <input type="password" class="form-control" name='password' id='password' aria-describedby="emailHelp">
  </div>
  <div class="alert alert-danger mb-3" id='errorBlock'></div>
  <button type="button" id="regbtn" class="btn btn-primary">Зареєструватись</button>
</form>
 </div>

 <div class="col-md-4">
<?php
 /*  echo 'test';
    $user = 'root';
$password = 'asDf';
$db = 'cars';
$host = 'localhost';
$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn,$user,$password);

$query = $pdo->query('SELECT * FROM `models`');

while($row = $query->fetch(PDO::FETCH_ASSOC))
echo $row['modelName'] . '<br>'; */
    ?>
 </div>
 </div>
 </main>
<?php include_once('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#regbtn').click(function(){

 var name=$('#name').val();
 var login=$('#login').val();
 var email=$('#mail').val();
 var password=$('#password').val();

$.ajax({
url: 'reg/reg.php',
type : 'POST',
cache: false,
data: {
'usName': name,
'usLogin' : login,
'usMail' : email,
'usPass' : password
},
dataType : 'html',
success : function(data){
  if(data=='Готово'){
    $('#regbtn').text('Все готово');
    $('#errorBlock').hide();
  }else{
    $('#errorBlock').show();
    $('#errorBlock').text(data);
  }
}

});
})
 

</script>
</body>
</html>
