<?php

require '/home/guelphseven/password.php';
require 'random.php';

function checkURL($url)
{
//      ?[A-Za-z0-9\-\._~:\/\?#\[\]@!$&\(\)\*\%\+,;]+$
	if (preg_match("/^http:\/\/images.google.com\/images\?[^'\"\\\\]+/",$url)==1)
		return true;
	else
		return false;
}

function stripProtocol($url)
{
	return preg_replace("/^http(s)?:\/\//", "", $url);
}

$postname=$_POST['story'];
$image1=$_POST['image1'];
$image2=$_POST['image2'];
$image3=$_POST['image3'];


//Validating and reformatting input
if (preg_match("/^[a-zA-Z0-9,;!:? ]+$/",$postname)!=1 || strlen($postname)<4 || strlen($postname)>64)
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
$link=genRandomString(8);
$res=mysql_query("select path from posts where path='$link';", $mysql);
while (mysql_num_rows($res)>=1)
{
	$link=genRandomString(8);
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

