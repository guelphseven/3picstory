<?php

require '/home/guelphseven/password.php';

//Check validity of link provided
if (!isset($_GET['page']))
{
	print("There's no post here!\n");
	exit();
}
$link=$_GET['page'];
if (!ctype_alnum($link) || strlen($link)!=32)
{
	print("There's no post here!\n");
	exit();
}

//Database connection
$mysql=mysql_connect('localhost', 'threepic', $MYSQL_PASS);
if (!$mysql || !mysql_select_db('threepic', $mysql))
{
	print("Something's wrong with the database!");
	exit();
}

//Fetching the data
$res=mysql_query("select name, image1, image2, image3 from posts where path='$link';", $mysql);
if (mysql_num_rows($res)!=1)
{
	print("There's no post here!\n");
	exit();
}
$postname=mysql_result($res, 0, 'name');
$image1=mysql_result($res, 0,  'image1');
$image2=mysql_result($res, 0, 'image2');
$image3=mysql_result($res, 0, 'image3');

//What the users see
print("<html>\n");
print("<br/><br/>\n");
print("<h1 align=\"center\">$postname</h1><br/>\n");
print("<p align=\"center\">\n");
print("<img src=\"http://$image1\" /><img src=\"http://$image2\" /><img src=\"http://$image3\" /><br/><br/>\n");
print("http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
print("</p>\n");
print("</html>");

?>
