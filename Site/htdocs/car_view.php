<?php
/************************************************************************************************************
*
* -- Licence: GPLv2
* -- Author : Michael Gutierrez
*
* -- Car Inventory Management Version: 2.0 
*
* Copyright Chavster.com 2009 
*
* -- Description:
* The Chavster Carlot Inventory management script is a php script that allows for car dealerships
* to display and manage their inventory in a live website. Limited CMS like functionality is 
* included to give users some control over content. To learn more visit
*
* http://www.chavster.com/carlot_management.html
*
* 
***********************************************************************************************************/

//Start our session
session_start();

//Include Files
include_once("configure.php"); //Configuration
include_once(PHP_INC . "db_variables.php"); //Database connectivity
include_once(PHP_INC . "cms_functions.php"); //CMS functions
include_once(PHP_INC . "car_functions.php"); //Car display functions

//Initial Variables
global $template;
global $template_path;
global $car;

//Get the template. This variable is also used in the template itself
$t = get_template();
$template_path = TEMPLATES . $t . "/";
$template      = SITE_ROOT."templates/" . $t . "/";

//Get the car we are looking at
$car = $_GET["vehicle"];


//include the template
include_once($template_path."car_view.php");

?>