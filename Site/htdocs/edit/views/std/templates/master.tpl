 {**
 * Project: Strobe IT CMS Edit Template
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: master.tpl
 * Version: 1.0
 *}


{*<?php
$CSSpath = TEMPLATES . get_template() . get_templateCSS();
?>*}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="author" content="Strobe IT - www.strobe-it.co.uk" />
	    <meta name="copyright" content="2012&copy; www.strobe-it.co.uk" />
	    <meta name="owner" content="Strobe Technologies Ltd" />
		
        <script type="text/javascript" src="{$__plugginDir}tiny_mce/tiny_mce.js"></script>
		<!-- file: '../../../../{$__plugginDir}kcfinder/browse.php?opener=tinymce&type=' + type, -->
        <script type="text/javascript">
            var csspath = "<?php echo $CSSpath ?>";
        
            function openKCFinder(field_name, url, type, win) {
                tinyMCE.activeEditor.windowManager.open({
                    file: '{$__plugginDir}kcfinder/browse.php?opener=tinymce&type=' + type,
                    title: 'KCFinder',
                    width: 700,
                    height: 500,
                    resizable: "yes",
                    inline: true,
                    close_previous: "no",
                    popup_css: false
                }, {
                    window: win,
                    input: field_name
                });
                return false;
            }
            
            tinyMCE.init({
                // General Options
                theme : "advanced",
                mode : "textareas",
                plugins : "table, fullscreen",
                relative_urls : false,

                // Theme Options
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_buttons1_add : "| , fullscreen",
                theme_advanced_buttons3_add : "tablecontrols",
                
		        content_css : "../" + csspath,
                file_browser_callback: 'openKCFinder'
            });
        </script>
        
        <link rel="stylesheet" href="{$__cssDir}admin.css" type="text/css" media="screen" />
        
		<title>{block name=title}Default Title{/block}</title>
	</head>
	<body>
        <div id="site-container">
            <div id="site-wrapper">
                <div id="site-header">
                    <div id="title-div">
                        <h1>CMS Control Panel</h1>
                    </div>
                </div>
                <div id="site-body">
                    <div id="body-left">
					{block name=leftbody}
                        <ul>
                            <?php if ($_SESSION['securelevel']==10) { ?>
                                <li><a href="/edit/page_new.php">New Page</a></li>
                            <?php } ?>
                            <li><a href="/edit/page_list.php">View / Edit Pages</a></li>
                            <li><a href="/edit/filemanager.php">File Manager</a></li>
                            <?php if ($_SESSION['securelevel']==10) { ?>
                                <li><a href="/edit/page_listauth.php">Web Page Approval</a></li>
                                <li><a href="/edit/settings.php">Website Settings</a></li>
                                <li><a href="/edit/user_list.php">User Manager</a></li>
                            <?php } ?>
                        </ul>
						<ul>
							<b>Modules</b>
							<!-- Need to add logic to hid etc -->
							<li><a href="/edit/mod/car/car.php">Car</a></li>
							<li><a href="/edit/property.php">Property</a></li>
						</ul>
                        <ul>
                            <li><a href="/edit/changepass.php">Change Password</a></li>
                            <li><a href="/edit/login.php?status=logout">Log Out</a></li>
                        </ul>
					{/block}
                    </div>
                    <div id="body-right">
					{block name=rightbody}Default Content{/block}
					</div>
                    <div class="clearing"></div>
                </div>
                <div id="site-footer"></div>
                <div id="strobe">
                    <p>&copy; 2012 <strong>Strobe IT</strong> | Design by <a href="http://www.strobe-it.co.uk/">Strobe IT</a></p>
                </div>
            </div>
        </div>
	</body>
</html>