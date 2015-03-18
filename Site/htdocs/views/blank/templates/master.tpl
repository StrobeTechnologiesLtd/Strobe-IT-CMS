 {**
 * Project: Strobe IT CMS Blank Style / Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: master.tpl
 * Version: 1.0
 *}


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	    <meta name="author" content="Strobe IT - www.strobe-it.co.uk" />
	    <meta name="copyright" content="2012&copy; www.strobe-it.co.uk" />
	    <meta name="owner" content="Strobe Technologies Ltd" />

	    <meta name="distribution" content="web" />
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	    <meta name="robots" content="INDEX,FOLLOW" />
	    <meta name="Keywords" content="{block name=keywords}Default Keywords{/block}" />
	    <meta name="Description" content="{block name=description}Default Description{/block}" />
        
        <script src="{$__jsDir}jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="{$__jsDir}jquery.cycle.lite.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('#slideshow1').cycle();
               });
        </script>

	    <link rel="stylesheet" href="{$__cssDir}main.css" type="text/css" />
		<link rel="icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="{$__imgDir}favicon.ico" type="image/x-icon" />
	    <title>{block name=title}Default Title{/block}</title>
    </head>
    <body>
        <div id="site-container">
            <div id="site-wrapper">
                <br />
                <div id="header">
                    <div id="slideshow1" class="pics">
                        <img src="{$__imgDir}headerpics/headerpic-1.png" alt="" />
                        <img src="{$__imgDir}headerpics/headerpic-2.png" alt="" />
                        <img src="{$__imgDir}headerpics/headerpic-3.png" alt="" />
                        <img src="{$__imgDir}headerpics/headerpic-4.png" alt="" />
                    </div>
                    <br />
                    <div id="sitemenu">
					{block name=sitenav}
                        <ul>
                            <li id="current"><a href="#"><span>Menu 1</span></a></li>
                            <li><a href="#"><span>Menu 2</span></a></li>
                            <li><a href="#"><span>Menu 3</span></a></li>
                            <li><a href="#"><span>Menu 4</span></a></li>
                            <li><a href="#"><span>Menu 5</span></a></li>
                            <li><a href="#"><span>Menu 6</span></a></li>
                            <li><a href="#"><span>Menu 7</span></a></li>
                        </ul>
					{/block}
                    </div>
                    <img id="logo" src="{$__imgDir}weblogo-small.png" alt="Logo" />
                </div>
                <div class="clearing-big"></div>
                
                <div id="content">
                    <div id="content-top"></div>
                    <div id="content-middle">
                        <div id="content-middleright">
                            <div id="sidemenu-outer">
                                <div id="sidemenu-top">
                                    <p>Side Menu</p>
                                </div>
                                <div id="sidemenu-body">
								{block name=sitesubnav}
                                    <ul>
                                        <li><a href="#">Link 1</a></li>
                                        <li><a href="#">Link 2</a></li>
                                        <li><a href="#">Link 3</a></li>
                                        <li><a href="#">Link 4</a></li>
                                    </ul>
								{/block}
                                </div>
                            </div>
							<h3>Quote 1</h3>
							<p class="quote">"This is a quote section"</p>
							<p>&nbsp;</p>
                            <h3>Quote 2</h3>			
			                <p class="quote">"This is another quote section"</p>
                        </div>
                        <div id="content-middleleft">
                            {block name=body}Default Content{/block}
                        </div>
                    </div>
                </div>
				<div class="clearing"></div>
                
                <div id="footer">
                    <div id="footer-left">
                        <p>Strobe Technologies Ltd T/a Strobe IT<br />
                            Myrtle Cottage<br />
                            Rackenford, Tiverton<br />
                            Devon EX16 8DT
                        </p>
                    </div>
                    <div id="footer-right">
                        Tel: 01884 664004<br />
                        Email: support@strobe-it.co.uk
                    </div>
                </div>
                <div class="clearing"></div>
                <div id="site-footer">
		            <p>&copy; 2012 <strong>Strobe IT</strong> |
		            Design by <a href="http://www.strobe-it.co.uk/">Strobe IT</a> |
		            Valid <a href="http://validator.w3.org/check/referer">XHTML</a> |
		            <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></p>
	            </div>
            </div>
        </div>
    </body>
</html>
