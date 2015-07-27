<?php
/************************************************************************************************************
*
* -- Licence: GPLv2
* -- Author : Michael Gutierrez
*
* Chavster.com 2009
* 
* -- Description:
* Part of the Chavster Carlot System. This page will scale down an image to be used as a thumb nail
* for such things as displaying featured cars on the front page. The second paramater of "thumb_output"
* determins the width. 
* 
* -- Use:
* Variables carid and pic are passed through $_GET. Example "thumb.php?pic=sompic.jpg&carid=1&width=320". 
* 
***********************************************************************************************************/

//Start our session
session_start();

//Include Files
include_once("configure.php"); //Configuration
include_once(PHP_INC . "db_variables.php"); //Database connectivity
include_once(PHP_INC . "thumb_output.php"); //Make thumbs using GD

$carid = $_GET['carid'];
$pic = $_GET['pic'];
//$picid = $_GET['picid'];
$file = CAR_PATH . $pic;
//$file = "c".$carid."p".$picid;

thumb_output($file, $_GET['width']);

?>