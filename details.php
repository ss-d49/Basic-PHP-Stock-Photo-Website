<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {font-size: 18px}
#wrapper #usernav {
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<div id="wrapper">
  <div id="header">
  </div>
  <div id="navigation">
  <a href="index.php">Home</a> | <a href="News.php">News</a> | <a href="contact.php">Contact Us</a> | <a href="help.php">Help</a> | <a href="about.php">About</a> </div>
  <div id="usernav">
  </div>
  <div id="main">
    <div id="left">
    <?php

	session_start();

	if ($_SESSION['username'])
	echo "Welcome, ".$_SESSION['username'] ."!<br><a href='logout.php'>Logout</a>
	<h1>&nbsp;</h1>
	<a href='lightbox.php'>My Lightboxes</a><br>
	&nbsp;<br>
	
	";
	else
    	echo 
		"<form action='login.php' method='POST'>
        Username: <input type='text' name='username'><br>
        Password: <input type='password' name='password'><br>
        <input type='submit' value='Log in'>
        </form> <p>
        <a href='register.php'>Register?</a>
        <h1>&nbsp;</h1>
		<href='lightbox.php'>My Lightboxes</a>
		";
	?>
		
		
		Search
      
        <form action='search.php' method='GET'>
        <left>
        <p>
        <input type='text' size='25' name='search'>
        </p>
        <p>
        <input name='submit' type='submit' value='Search'/>
        </p>
        </left>
        </form>
		
		
    </div>
    <!-- InstanceBeginEditable name="content" -->
    <div id="right">
    <?php
			//connect to our database
		
		mysql_connect("localhost", "root", "password");
		mysql_select_db(photosearch);
		
		$id = $_GET['id']; 
		$query  = "SELECT * FROM searchengine WHERE id=$id";
		$result = mysql_query($query);
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
		$image = $row['image'];
		$title = $row['title'];
		$desc = $row['description'];
		$url = $row['url'];
		$image_watermark = $row['image_watermark'];
		$highres = $row['highres'];
		$stndres = $row['stndres'];
		
		echo "
	    <h1 class=style5>$title</h1>
        <p class=style5>&nbsp;</p>
        <table width=772 border=0 cellpadding=0 cellspacing=0>
        <tr>
        <td width=500><img src='$image_watermark' alt='$desc'/></td>
        <td width=272><p align=center class=style5>$desc</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>Download <a href=$image_watermark>Preview Image</a></p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>&nbsp;</p>
        <p align=center class=style5>Download <a href=$stndres>Image for Personal Use</a></p>
        <p align=center class=style5>&nbsp;</p>
		<p align=center class=style5>Download <a href=$highres>High Resolution Image</a></p></td>
        </tr>
        </table>";

		
		} 

	  ?>
    </div>
    <!-- InstanceEndEditable --></div>
<div id="footer">
Copyright &copy; 2010 SnoadStock&#8482;. All rights reserved.</div>
</div>
</body>
<!-- InstanceEnd --></html>
