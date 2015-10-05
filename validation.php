<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	// TODO
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(isEmailAvailable($db, $email) === true ){
		if(isUsernameAvailable($db, $username) === true){

				userRegistration($db, $username, $email, $password);
				$_SESSION['message'] = 'Bien joué';
				header('Location:login.php');

}else{
			$_SESSION['message'] = 'Mauvais email';
			header('Location: register.php');

			}
		}else{
		$_SESSION['message'] = 'Mauvais pseudo';
		header('Location: register.php');
}
	

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}