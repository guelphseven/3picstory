<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ThreePicStory</title>
    <meta name="description" content="">
    <meta name="author" content="The Guelph Seven">
    <meta name="keywords" content="guelph seven guelphseven 8 cubed android startups development coding apps uog uoguelph uwaterloo">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/base/jquery-ui.css">-->
    <script src="http://www.google.com/jsapi">
    <script>google.load('search','1');</script>
    <script src="/js/wc.js"></script>
    <script src="/js/libs/modernizr-1.6.min.js"></script>
</head>
<body>
    <div id="container">
    <header>
        <h1><a href="/">3picStory</a></h1>
        <div id="description">
            <p>Text!</p>
        </div>
    </header>
    <div id="main">
        <!-- <form id="roulette-form"> -->
            <input id="input-words" type="text" placeholder="Enter Three Words" name="words">
            <!--<input id="input-submit" type="submit" value="Go!">i-->
	    <!--<button id="input-submit">Go!</button>-->
	    <input type="button" id="input" value="Go!">
        <!-- </form> -->
    </div>
    <footer>
            <div id="search1">Link</div>
            <div id="search2">Link</div>
            <div id="search3">Link</div>
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
    <!-- <script src="/js/magic.js"></script> -->
    <!--[if lt IE 7 ]>
    <script src="/js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .ipng_bg'); </script>
    <![endif]-->
    <script src="http://static.getclicky.com/js"></script>
    <noscript><p><img alt="Clicky" width="1" height="1" src="http://in.getclicky.com/XXXXXXXXns.gif" /></p></noscript>
	<script>
		google.load('search','1');
		var images;
		$("#input").click(function(){
			images = $("#input-words").val().split(" ");
			alert(images);
			load_up(images[0], "search1");
			load_up(images[1], "search2");
			load_up(images[2], "search3");
		})

	</script>   

 <script>
        var _gaq = [['_setAccount', 'XX-XXXXXXXX-X'], ['_trackPageview']];
        (function(d, t) {
            var g = d.createElement(t),
            s = d.getElementsByTagName(t)[0];
            g.async = true;
            g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g, s);
        })(document, 'script');
        try{ clicky.init(XXXXXXXX); }catch(err){}
    </script>
</body>
</html>
