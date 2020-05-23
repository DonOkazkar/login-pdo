<?php

require_once('function.php');
dbconnect();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$res = $pdo->exec("INSERT INTO `users` SET username='".$_POST['username']."', email='".$_POST['email']."', password='".MD5($_POST['password'])."', membership='Author', picname='author,png'");
	if($res){
			if (attempt($_POST['username'], $_POST['password'])) {
				redirect('home.php');
			}
			else {
				redirect('register.php?error=' . urlencode('Username already taken'));
			}
	}
}

?>