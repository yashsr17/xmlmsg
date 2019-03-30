<?php session_start(); 
?><a href="logout.php">logout</a>
<title>XML</title>
<br><br><center><u><h1><b>PHP->SOAP->XML</b></h1></u></center></body><br><br>
<form action='#' method="post">
<table>
  <tr>
    <td>Email-address:</td>
    <td>
    <input class="frmInput" type="text" size="30" name="email">
    </td>
  </tr>
  <tr>
    <td>Pass-word:</td>
    <td>
    <input type="password" size="30" name="pass">
    </td>
</table>
<br>
<input type="submit" value="Proceed" name="proceed" class="button">
</form>
<?php 
if(isset($_REQUEST['proceed'])){
	$_SESSION['semail'] = $_POST['email'];
	$_SESSION['pass'] = $_POST['pass'];
}
if(isset($_SESSION['semail']) && isset($_SESSION['pass'])){
	$x = $_SESSION['semail'];
	$y = $_SESSION['pass'];
	$link = mysqli_connect("localhost","root","","emailpass");
	$sql = mysqli_query($link,"SELECT * FROM emailpass WHERE email = '$x' AND pass='$y'");
	if(mysqli_num_rows($sql)>0){
		echo "<center><b><i><h3>Message-Box</h3></i></b></center><br><br>
		<form action='backend.php' method='post'>
		<table><tr><td>Senders-id:</td><td><input type='text' size='60' name='rec'></td></tr>
		<tr><td>Message:</td><td><textarea rows='6' cols='50' style='font-size:30px;' name='msg'></textarea></td></tr></table>
		<input type='submit' value='Send' name='send' class='button'>
		</form>";
	}
	echo "<br><br><br><center><b><i><h3>Recieve-Box</h3></i></b></center>";
	$document = simplexml_load_file('database.xml');
	foreach ($document->data as $data){
		if($data->Receiverid==$_SESSION['semail']){
			echo '<table><tr><td>Sender-id:</td><td>'.(string)$data->Senderid.'</td></tr><tr><td>Message:</td><td>'.(string)$data->Message.'</td></pre></tr></table>';
		}
	}
	echo "<br><br><br><center><b><i><h3>Sent-Box</h3></i></b></center>";
	foreach ($document->data as $data){
		if($data->Senderid==$_SESSION['semail']){
			echo '<table><tr><td>Reception:</td><td>'.(string)$data->Receiverid.'</td></tr><tr><td>Message:</td><td>'.(string)$data->Message.'</td></pre></tr></table>';
		}
	}
}
?>