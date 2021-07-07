<?php
$username=trim(filter_var($_POST['usName'], FILTER_SANITIZE_STRING));
$login=trim(filter_var($_POST['usLogin'], FILTER_SANITIZE_STRING));
$mail=trim(filter_var($_POST['usMail'], FILTER_SANITIZE_EMAIL));
$pass=trim(filter_var($_POST['usPass'], FILTER_SANITIZE_STRING));

$error='';
if(strlen($username)<=3)
$error= 'Enter name';
else if(strlen($login)<=3)
$error= 'Enter login';
else if(strlen($mail)<=3)
$error= 'Enter email';
else if(strlen($pass)<=3)
$error= 'Enter password';

if($error!=''){
echo $error;
exit();
}

$hash='xdr6ygv8uhb';
$pass= md5($pass.$hash);

require_once '../mysql_connect.php';

$sql='INSERT INTO users(name,login,email,password)VALUES(?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$username,$login,$mail,$pass]);

echo 'Готово';

?>