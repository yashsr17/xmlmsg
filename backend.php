<?php 
session_start();
include "client.php";
if($_POST['rec']==NULL){
	header('location:login.php');
}else{
	$client = new client;
	$sid = $_SESSION['semail']; 
	$msg=$_POST['msg'];
	$rid =$_POST['rec'];
	echo $client->sendMsg($sid,$msg,$rid);
	//unset($_SESSION['semail'])
	header('location:login.php');
}
?>