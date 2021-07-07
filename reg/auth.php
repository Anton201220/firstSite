<?php
$login=trim(filter_var($_POST['usLogin'], FILTER_SANITIZE_STRING));
$pass=trim(filter_var($_POST['usPass'], FILTER_SANITIZE_STRING));

$error='';
if(strlen($login)<=3)
$error= 'Enter correct login';
else if(strlen($pass)<=3)
$error= 'Enter correct password';

if($error!=''){
echo $error;
exit();
}

$hash='xdr6ygv8uhb';
$pass= md5($pass.$hash);

require_once '../mysql_connect.php';

$sql='SELECT `id` FROM `users` WHERE  `login`=:login && `password`=:password';
$query = $pdo->prepare($sql);
$query->execute(['login'=>$login,'password'=>$pass]);

$user= $query->fetch(PDO::FETCH_OBJ);
if($user->id==0)
echo 'There isnt same user';
else{
    setcookie('login', $login,time()+3600,'/');
echo 'Готово';
}
?>