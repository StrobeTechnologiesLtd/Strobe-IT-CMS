<?php
/************************************************************************************************************
* 
* -- Description:
* Part of the Chavster Carlot System. This page will scale down an image to be used as a thumb nail
* for such things as displaying featured cars on the front page. The second paramater of "thumb_output"
* determins the width. 
* 
* -- Use:
* Variables are passed through $_GET. Example "thumb.php?pic=sompic.jpg&path=propimages&width=100&height=100".
* 
***********************************************************************************************************/

//Include Files
require_once('../config.inc.php');
require_once("includes/thumb_output.inc.php"); //Make thumbs using GD

//Set Variables
$path = "";
$pic = "";
$height = 0;
$width = "";

//Collect Data
$path = $_GET['path'];
$pic = $_GET['pic'];
$height = $_GET['height'];
$width = $_GET['width'];
$file = $livepath . "/" . $path . "/" . $pic;


if ($height == 0) {
	thumb_output($file, $width);
} else {
	thumb_output($file, $width, $height);
}

?>