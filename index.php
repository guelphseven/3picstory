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
    <meta name="description" content="">
    <meta name="author" content="The Guelph Seven">
    <meta name="keywords" content="guelph seven guelphseven 7 cubed android startups development coding apps uog uoguelph uwaterloo">
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
            <p>Just Three Words</p>
            <p>An Epic Tale</p>
        </header>
        <div id="main">
            <form id="entry">
                <input id="getwords" type="text" placeholder="Enter Three Words" name="getwords">
                <input type="submit" id="search" onclick="return false;" value="3pic It!">
            </form>
            <div id="search-1"></div>
            <div id="search-2"></div>
            <div id="search-3"></div>
            <form id="details" method="post" action="save.php">
                <input type="hidden" id="image1" name="image1">
                <input type="hidden" id="story" name="story">
                <input type="hidden" id="image2" name="image2">
                <input type="hidden" id="image3" name="image3">
                <input id="input-submit" type="submit" value="Save!">
            </form>
        </div>
        <div>
        <footer>
            <ul>
                <li>An App in a Day by <a href="http://www.guelphseven.com">The Guelph Seven</a></li>
                <!--<li><a href="https://github.com/guelphseven/3picstory" target="_blank"><img src="/img/github_32.png" /></a></li>-->
            </ul>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.5.1.min.js">\x3C/script>')</script>
    <script src="http://www.google.com/jsapi"></script>
    <script src="/js/images.js"></script>
    <script src="/js/setup.js"></script>

    <!--[if lt IE 7 ]>
    <script src="/js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .ipng_bg'); </script>
    <![endif]-->
</body>
</html>
