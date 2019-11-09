<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username&&$password)
{

$connect = mysql_connect("localhost", "root", "password") or die("Couldn't connect!");
mysql_select_db("phplogin") or die ("Couldn't find db!");

$query = mysql_query("SELECT * FROM users WHERE username='$username'");

$numrows = mysql_num_rows($query);

if($numrows!=0)
{
	while ($row = mysql_fetch_assoc($query))
	{
		  $dbusername = $row['username'];
		  $dbpassword = $row['password'];
	}
	
	//check to see if they match!
	if ($username==$dbusername&&md5($password)==$dbpassword)
	{
		header( 'Location: index.php' ) ;
		$_SESSION['username']=$username;
	}
	else
		echo "Incorrect password!";


}
else
	die("That user dosn't exist");

}
else
	die("Please enter a username and a password!")



?>