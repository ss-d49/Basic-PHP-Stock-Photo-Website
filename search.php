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
	
//get data
$button = $_GET['submit'];
$search = $_GET['search'];

if (!$button)
	echo "You didn't submit a keyword.";
else
{
	if (strlen($search)<=2)
	   echo "Search term too short.";
	else
	{
		echo "You searched for <b>$search</b><hr size='1'>";
		
		//connect to our database
		
		mysql_connect("localhost", "root", "password");
		mysql_select_db(photosearch);
		

			  
			  //explode our search term
			  $search_exploded = explode(" ",$search);
			  
			  foreach($search_exploded as $search_each)
			  {
			   //construct query
			   $x++;
			   if ($x==1)
			      $construct .= "keywords LIKE '%$search_each%'";
			   else
			      $construct .= " OR keywords LIKE '%$search_each%'";
			  }

		//echo out construct
		
		$construct = "SELECT * FROM searchengine WHERE $construct";
		$run = mysql_query($construct);
		
		$foundnum = mysql_num_rows($run);
		
		if ($foundnum==0)
			echo "No results found.";
		else
		 {
		 echo "$foundnum results found!<p>";
		 
		 while ($runrows = mysql_fetch_assoc($run))
		 {
		 //get data
		 $image = $runrows['image'];
		 $title = $runrows['title'];
		 $desc = $runrows['description'];
		 $url = $runrows['url'];
		 $image_watermark = $runrows['image_watermark'];
		 
		 echo "
		 <table 'display:inline;' width=200 height=220 border=0 cellpadding=0 cellspacing=0>
  	     <tr>
         <td><img src=$image alt=$desc/>
         </td>
         </tr>
         <tr>
         <td><a href='$url'>$title</a></td>
         </tr>
         <tr>
         <td>$desc</td>
         </tr>
         </table> 	 
		 ";
		 
		}
	}
  }
}

?>		
    </div>
    <!-- InstanceEndEditable --></div>
<div id="footer">
Copyright &copy; 2010 SnoadStock&#8482;. All rights reserved.</div>
</div>
</body>
<!-- InstanceEnd --></html>
