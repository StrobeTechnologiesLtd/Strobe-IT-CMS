<?php 
/************************************************************************************************************
*
* -- Licence: GPLv2
* -- Author : Michael Gutierrez
*
* Chavster.com 2009
* 
* -- Description:
* Resize and output an image. This requires that GD be installed. Currently accepts *.png, *.gif,
* *.jpg, and *.jpeg as well as capitalized versions of said extensions. It should be included in
* another php file that gets the parameters of source file and target width. Target height is optional
* 
* -- Use:
* thumb_output(some image, desired width, desired height: optional); If no height is set then the
* function will scale the height so that the image is scaled. If the height is given then the
* image will stretch to given dimensions. If the original image is 2000 x 1000 and the height
* and width are given thumb_output('some_image.jpg', 200,200); then it will be scaled down
* but stretched from the perspective of height. On the other hand 
* thumb_output('some_image.jpg', 200); will scale the height to 100 so that the image is scaled
* 
***********************************************************************************************************/


function thumb_output($source_file, $target_width, $target_height=0)
{
	// Get source dimensions
	list($source_width, $source_height) = getimagesize($source_file);
	
	
	//If a taget hight is not set then set it with respect to selected width
	if($target_height == 0)
	{
		//set up ratio and decide target height
		$ratio = $source_height/$source_width;
		$target_height = $ratio * $target_width;
	}
	
	// Resample
	$image_p = imagecreatetruecolor($target_width, $target_height);
	
	//Get Extension
	$temp = explode ( '.', $source_file);
	$exten = $temp[count($temp)-1];
	
	switch($exten)
	{
		case 'jpg':
		case 'JPG':
		case 'jpeg':
		case 'JPEG':
			$image = imagecreatefromjpeg($source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $target_width, $target_height, $source_width, $source_height);

			// Output
			imagejpeg($image_p, null, 100);
		break;
		case 'png':
		case 'PNG':
			$image = imagecreatefrompng($source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $target_width, $target_height, $source_width, $source_height);

			// Output
			imagepng($image_p);
		break;
		
		case 'gif':
		case 'GIF':
			$image = imagecreatefromgif($source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $target_width, $target_height, $source_width, $source_height);

			// Output
			imagegif($image_p);
		break;
	}
	
	
}

?>