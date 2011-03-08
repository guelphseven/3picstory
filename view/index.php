<?php

require '/home/guelphseven/password.php';

//Check validity of link provided
if (!isset($_GET['page']))
{
	print("There's no post here!\n");
	exit();
}
$link=$_GET['page'];
if (!ctype_alnum($link) || strlen($link)!=8)
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
?>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'902b6c1a-a165-402f-9a1a-33148768f58e'});</script>

<?php
print("<h1>$postname</h1><br/>\n");
print("<img src=\"http://$image1\" /><br/>\n");
print("<img src=\"http://$image2\" /><br/>\n");
print("<img src=\"http://$image3\" /><br/><br/>\n");
print("http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
print("<br/>\n");
?>

<span class="st_twitter_hcount" displayText="Tweet"></span><span class="st_facebook_hcount" displayText="Share"></span><span class="st_email_hcount" displayText="Email"></span><span class="st_sharethis_hcount" displayText="Share"></span>

<?php
print("</html>");

?>
