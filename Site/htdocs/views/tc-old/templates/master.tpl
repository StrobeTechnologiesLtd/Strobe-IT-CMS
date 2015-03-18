 {**
 * Project: Thorne + Carter Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: master.tpl
 * Version: 1.0
 *}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	    <meta name="author" content="Strobe IT - www.strobe-it.co.uk" />
	    <meta name="copyright" content="2013&copy; www.strobe-it.co.uk" />
	    <meta name="owner" content="Strobe Technologies Ltd" />

	    <meta name="distribution" content="web" />
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	    <meta name="robots" content="INDEX,FOLLOW" />
	    <meta name="Keywords" content="{block name=keywords}Default Keywords{/block}" />
	    <meta name="Description" content="{block name=description}Default Description{/block}" />
        
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
		
		{block name=add_head}{/block}

	    <link rel="stylesheet" href="{$__cssDir}main.css" type="text/css" />
		<link rel="icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
	    <title>{block name=title}Thorne &amp; Carter - Template{/block}</title>
    </head>
    <body>
        <div id="site-container">
            <div id="site-wrapper">
                <br />
                <div id="header">
                    <img id="logo" src="{$__imgDir}logo.png" alt="Thorne and Carter Logo" />
					<img id="telnum" src="{$__imgDir}tctel.png" alt="01884 33333" />
                </div>
                <div class="clearing-big"></div>
				<div id="sitemenu">
				{block name=sitenav}
					<ul>
						<li id="current"><a href="#"><span>Menu 1</span></a></li>
						<li><a href="#"><span>Menu 2</span></a></li>
						<li><a href="#"><span>Menu 3</span></a></li>
						<li><a href="#"><span>Menu 4</span></a></li>
						<li><a href="#"><span>Menu 5</span></a></li>
					</ul>
				{/block}
				</div>
				<div class="clearing"></div>
                
                <div id="content">
				{block name=body}
				{/block}
                </div>
				<div class="clearing"></div>
                
                <div id="footer">
                    <div id="footer-left">
                        <a href="https://www.facebook.com/pages/Thorne-Carter/145843785626945" title="Follow Us via Fackbook"><img src="{$__imgDir}fb.png" alt="Follow Us on Facebook" width="35" height="35" /></a>
						<a href="https://twitter.com/ThorneCarter/" title="Follow Us via Twitter"><img src="{$__imgDir}tw.png" alt="Follow Us on Twitter" width="35" height="35" /></a>
						<a href="#" title="Follow Us via LinkedIn"><img src="{$__imgDir}in.png" alt="Follows Us via LinkedIn" width="35" height="35" /></a>
                    </div>
                    <div id="footer-right">
						<a href="#" title="National Association of Estate Agents"><img src="{$__imgDir}naea.gif" alt="NAEA Logo" width="80" height="34" /></a>
                        <a href="#" title="RICS"><img src="{$__imgDir}rics-logo.gif" alt="RICS Logo" width="92" height="34" /></a>
                    </div>
                </div>
                <div class="clearing"></div>
                <div id="site-footer">
		            <p>&copy; 2013 <strong>Strobe IT</strong> |
		            Design by <a href="http://www.strobe-it.co.uk/">Strobe IT</a> |
		            Valid <a href="http://validator.w3.org/check/referer">XHTML</a> |
		            <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></p>
	            </div>
            </div>
        </div>
    </body>
</html>