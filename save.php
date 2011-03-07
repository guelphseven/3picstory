<?php

require '/home/guelphseven/password.php';
require 'random.php';

function checkURL($url)
{
	if (preg_match("/^http(s)?:\/\/[A-Za-z0-9-\._~:\/?#\[\]@!$&\(\)\*\%\+,;]+$/",$url)==1)
		return true;
	else
		return false;
}

function stripProtocol($url)
{
	return preg_replace("/^http(s)?:\/\//", "", $url);
}

$postname="Dude";
$image1="http://guelphseven.com/img/thumb_paul.png";
$image2="http://guelphseven.com/img/thumb_luke.png";
$image3="http://guelphseven.com/img/thumb_quincy.png";


//Validating and reformatting input
if (!ctype_alnum($postname) || strlen($postname)<4 || strlen($postname)>64)
{
	print("Error: Invalid name\n");
	exit();
}

if (!checkURL($image1) || !checkURL($image2) || !checkURL($image3))
{
	print("Invalid URL\n");
	exit();
}

$image1=stripProtocol($image1);
$image2=stripProtocol($image2);
$image3=stripProtocol($image3);

//Preparing mysql connection
$mysql=mysql_connect("localhost", "threepic", $MYSQL_PASS);
if (!$mysql || !mysql_select_db("threepic", $mysql))
{
	print("Something's wrong with the database!");
	exit();
}

//Generating unique link 
$link=genRandomString(32);
$res=mysql_query("select path from posts where path='$link';", $mysql);
while (mysql_num_rows($res)>=1)
{
	$link=genRandomString(32);
	$res=mysql_query("select path from posts where path='$link';", $mysql);
}


//Saving into database
if (!mysql_query("insert into posts (name, path, image1, image2, image3) values ('$postname', '$link', '$image1', '$image2', '$image3');"))
{
	print("Failed to save the post!\n");
	exit();
}


header("Location: /view/$link");

?>

