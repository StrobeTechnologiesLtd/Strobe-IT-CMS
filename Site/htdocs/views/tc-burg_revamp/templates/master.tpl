 {**
 * Project: Thorne + Carter Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: master.tpl
 * Version: 2.1
 *}

<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta name="author" content="Strobe IT - www.strobe-it.co.uk" />

	    <meta charset="UTF-8">
		<meta name="robots" content="index,follow" />
		<meta name="rating" content="safe for kids" />
	    <meta name="keywords" content="{block name=keywords}Default Keywords{/block}" />
	    <meta name="description" content="{block name=description}Default Description{/block}" />
		
		<!-- Google Analytics -->
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46071324-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		
		<!-- JQuery 1.10.2 with JQuery Migrate 1.2.1 -->
        <!-- <script src="{$__jsDir}jquery/jquery-1.7.2.min.js" type="text/javascript"></script> -->
		<script src="{$__jsDir}jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script src="{$__jsDir}jquery/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
		
		<!-- JQuery Cycle Lite -->
        <script src="{$__jsDir}jquery.cycle.lite.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('#slideshow1').cycle();
               });
        </script>
		
		<!-- required snowstorm JS, default behaviour -->
		<!--<script src="{$__jsDir}snowstorm.js"></script>-->

		<!-- now, we'll customize the snowStorm object -->
		<!--<script>
			snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
			snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
			snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
		</script>-->
		
		{block name=add_head}{/block}

	    <link rel="stylesheet" href="{$__cssDir}main.css" type="text/css" />
		<link rel="stylesheet" href="{$__cssDir}tablet.css" type="text/css" media="screen and (min-width: 768px) and (max-width: 980px)" />
		<link rel="stylesheet" href="{$__cssDir}mobile.css" type="text/css" media="only screen and (max-width: 480px), only screen and (max-device-width: 480px)" />
		<link rel="stylesheet" href="{$__cssDir}print.css" type="text/css" media="print, handheld" />
		<!--[if lte IE 6]>
		<link rel="stylesheet" href="">
		<![endif]-->	
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
		<link rel="icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
	    <title>{block name=title}Thorne &amp; Carter - Template{/block}</title>
    </head>
    <body> 
<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div id="site-container">
            <div id="site-wrapper">
                <br />
                <header id="header">
					<div id="slideshow1" class="pics">
						<img src="{$__imgDir}header1.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header2.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header3.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header4.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header5.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header6.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header7.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header8.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header9.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header10.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header11.jpg" height="300" width="900" alt="Header Picture" />
						<img src="{$__imgDir}header12.jpg" height="300" width="900" alt="Header Picture" />
					</div>
					<div id="logo"><img src="{$__imgDir}logo.png" alt="Thorne and Carter Logo" height="71" width="250" /></div>
                </header>
                <div class="clearing-big"></div>
				<nav role="navigation" id="sitemenu">
				{block name=sitenav}
					<ul>
						<li id="current"><a href="#"><span>Menu 1</span></a></li>
						<li><a href="#"><span>Menu 2</span></a></li>
						<li><a href="#"><span>Menu 3</span></a></li>
						<li><a href="#"><span>Menu 4</span></a></li>
						<li><a href="#"><span>Menu 5</span></a></li>
					</ul>
				{/block}
				</nav>
				<div class="clearing"></div>
                
                <section id="content">
				{block name=body}
				{/block}
                </section>
				<div class="clearing"></div>
                
                <footer id="footer">
                    <div id="footer-left">
                        <a href="https://www.facebook.com/pages/Thorne-Carter/145843785626945" title="Follow Us via Fackbook"><img src="{$__imgDir}fb.png" alt="Follow Us on Facebook" width="35" height="35" /></a>
						<a href="https://twitter.com/ThorneCarter/" title="Follow Us via Twitter"><img src="{$__imgDir}tw.png" alt="Follow Us on Twitter" width="35" height="35" /></a>
						<!--<a href="#" title="Follow Us via LinkedIn"><img src="{$__imgDir}in.png" alt="Follows Us via LinkedIn" width="35" height="35" /></a> -->
						<a href="https://plus.google.com/b/111231952689413427962/111231952689413427962/" title="Follow Us via Google+"><img src="{$__imgDir}gp.png" alt="Follow Us on Google+" width="35" height="35" /></a>
                    </div>
                    <div id="footer-right">
						<a href="#" title="National Association of Estate Agents"><img src="{$__imgDir}naea.gif" alt="NAEA Logo" width="80" height="34" /></a>
                        <a href="#" title="RICS"><img src="{$__imgDir}rics-logo.gif" alt="RICS Logo" width="92" height="34" /></a>
                    </div>
                </footer>
                <div class="clearing"></div>
				<div>
					<!-- Place this tag where you want the +1 button to render. -->
					<div class="g-plusone" data-size="medium"></div>
					
					<!-- Place this tag where you want the Like button to render. -->
					<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

					<!-- Place this tag after the last +1 button tag. -->
					<script type="text/javascript">
						(function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/platform.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						})();
					</script>
					
					<!-- Place this tag where you want the Tweet button to render. -->
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="ThorneCarter">Tweet</a>
			
					<!-- Place this tag after the last Tweet button tag. -->
					<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>
                <div id="site-footer">
					<p class="float-right"><a href="/resources/Disclaimer.pdf">Disclaimer&nbsp;&nbsp;</a></p><br />
		            <p>&copy; 2013 <strong>Strobe IT</strong> |
		            Design by <a href="http://www.strobe-it.co.uk/">Strobe IT</a> |
		            Valid <a href="http://validator.w3.org/check/referer">HTML5</a> |
		            <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></p>
	            </div>
            </div>
        </div>
    </body>
</html>