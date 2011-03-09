<?php
require '/home/guelphseven/password.php';
$postname = "";
function doView() {
    global $postname;
    global $MYSQL_PASS;
    //Check validity of link provided
    if (!isset($_GET['page']))
    {
        return false;
    }

    $link=$_GET['page'];
    if (!ctype_alnum($link) || strlen($link)!=8)
    {
        return false;
    }

    //Database connection
    $mysql=mysql_connect('localhost', 'threepic', $MYSQL_PASS);
    if (!$mysql || !mysql_select_db('threepic', $mysql))
    {
        return false;
    }

    //Fetching the data
    $res=mysql_query("select name, image1, image2, image3 from posts where path='$link';", $mysql);
    if (mysql_num_rows($res)!=1)
    {
        return false;
    }

    $postname=mysql_result($res, 0, 'name');
    $image1='http://' . mysql_result($res, 0,  'image1');
    $image2='http://' . mysql_result($res, 0, 'image2');
    $image3='http://' . mysql_result($res, 0, 'image3');
    $words = split(' ',$postname);
    echo '<div id="result" class="result"><div class="thumbs"><span id="one" style="display: inline; "><img style="height:150px;" alt="'.$words[0].'" src="'.$image1.'"></span><span id="two" style="display: inline; "><img style="height:150px;" alt="'.$words[1].'" src="'.$image2.'"></span><span id="three" style="display: inline; "><img style="height:150px;" alt="'.$words[2].'" src="'.$image3.'"></span></div><form id="share"><label>Link to this page: <input type="text" value="http://3picstory.com/'.$link.'" /></label></form></div>';
    return true;
}
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>3picStory</title>
    <meta name="description" content="Just three words, an epic tale">
    <meta name="author" content="The Guelph Seven">
    <meta name="keywords" content="3picstory three pic pics pictures story epic tale google images guelph seven guelphseven 7 cubed android startups development coding apps uog uoguelph uwaterloo">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <link  href="http://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css" >
    <script src="/js/libs/modernizr-1.6.min.js"></script>
   </head>
<body>
    <div id="container">
        <header>
            <h1>3picStory</h1>
        </header>
        <div id="result">
<?php
$view = doView();
if(!$view){
    echo "            <p>Just Three Words</p>\n";
    echo "            <p>An Epic Tale</p>\n";
}
?></div>
        <div id="main">
            <form id="entry">
            <input type="text" placeholder="Enter Three Words" id="getwords" <?php if($view){echo "value=\"$postname\"";} ?>/>
                <input type="submit" value="3pic It!" />
            </form>
        </div>
        <div>
        <footer>
            <ul>
                <li>An App in a Day by <a href="http://www.guelphseven.com">The Guelph Seven</a></li>
                <li><a href="https://github.com/guelphseven/3picstory" target="_blank"><img src="/img/github_black_32.png" /></a></li>
            </ul>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.5.1.min.js">\x3C/script>')</script>
    <script src="http://www.google.com/jsapi"></script>
    <script src="/js/3picstory.js"></script>
    <!--[if lt IE 7 ]>
    <script src="/js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .ipng_bg'); </script>
    <![endif]-->
    <script type="text/javascript"> 
    var clicky = { log: function(){ return; }, goal: function(){ return; }};
    var clicky_site_id = 66395197;
    (function() {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = ( document.location.protocol == 'https:' ? 'https://static.getclicky.com/js' : 'http://static.getclicky.com/js' );
    ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
    })();
    </script> 
    <a title="Web Analytics" href="http://getclicky.com/66395197"></a> 
    <noscript><p><img alt="Clicky" width="1" height="1" src="http://in.getclicky.com/66395197ns.gif" /></p></noscript> 
</body>
</html>
