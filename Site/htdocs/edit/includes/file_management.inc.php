<?php # file_management.inc.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: file_management.inc.php
 * Version: 1.0
 */

/*DESCRIPTION: O.k it's not really a library just a function, but it works pretty good.
			You pass this function an array of acceptable extensions, the path you
			are uploading to, and the file. It also allows you to specify a max file size
			but the defualt is 8 million bytes

INSTRUCTIONS:
        call like so:
            $OkExt = Array('php', 'htm', 'html')
            DoFileUpload('Userfile', 1024, './upload', '', $OkExt , '', '') 
        Variables used:
            $ForceFilename is if you want to use this name instead of whats in the $_FILES var.
            $Overwriteok - set to anything but '' for yes
            $ErrorFunction - set to the of the function you wish, or '' to use default.
				The default returns an error number but you can change the return a message or full report
***************************************************************************************/




//Function to delete file
//=======================
function do_file_delete($InputFile, $InputType, $Path="") {
	$Path=$_SERVER["DOCUMENT_ROOT"]."/$Path";
	unlink($Path.$InputFile.$InputType);
}


//Function to get file extension
//==============================
function GetExt($Filename) {
	$RetVal = explode ( '.', $Filename);
	return $RetVal[count($RetVal)-1];
}


//Function to report error
//========================
// Call to function should be: -
// return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
function ErrorReport($ErrType, $ErrNo, $ErrMsg, $TempFile, $FileSize, $FileName, $FileType, $Path) {
	switch ($ErrType) {
		case "NUM":
			return $ErrNo;
			break;
		case "FULL":
			$err = '<table border="1">
						<tr>
							<td>File Type: </td>
							<td>' . $FileType . '</td>
						</tr>
						<tr>
							<td>File Size: </td>
							<td>' . ($FileSize / 1024) . ' Kb</td>
						</tr>
						<tr>
							<td>Name of Temp File: </td>
							<td>' . $TempFile . '</td>
						</tr>
						<tr>
							<td>Name of File: </td>
							<td>' . $FileName . '</td>
						</tr>
						<tr>
							<td>File Path: </td>
							<td>' . $Path . '</td>
						</tr>
						<tr>
							<td>Error Code: </td>
							<td>' . $ErrNo . '</td>
						</tr>
						<tr>
							<td>Error Msg: </td>
							<td>' . $ErrMsg . '</td>
						</tr>
					</table>';
			return $err;
			break;
		case "MSG":
			return "Error $ErrorNumber : $ErrorText";
			break;
	}
}


//Function to upload file
//=======================
//Call this function from somewhere else. If there is an error then
// Full error report returned or just a number
function do_file_upload($InputFile, $Path="", $MaxSize=8000000, $ExtsOk=array(), $OverwriteOk=true, $ForceFilename="", $ErrorFunction="NUM") {

    $Path=$_SERVER["DOCUMENT_ROOT"]."/$Path";
    
	$ErrNo = -1;
	$TempFile = $_FILES[$InputFile]['tmp_name'];
	$FileSize = $_FILES[$InputFile]['size'];
	$FileName = $_FILES[$InputFile]['name'];
	$FileType = $_FILES[$InputFile]['type'];
	if (strlen($ForceFilename)) { $FileName = $ForceFilename; }
	
	
	if($TempFile == 'none' || $TempFile == '')
	{
		$ErrorTxt = "This File was unspecified.";
		$ErrNo = 1;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	}
	
	if(!is_uploaded_file($TempFile))
	{
		$ErrorTxt = "File Upload Attack, Filename: \"".$FileName."\"";
		$ErrNo = 2;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	} //if(!is_uploaded_file($TempFile))
	
	//Dose the file have a size?
	if($FileSize == 0)
	{
		$ErrorTxt = 'The file you attempted to upload is zero length!';
		$ErrNo = 3;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	} //$FileSize == 0

	//call function GetExt to get the file extension
	$TheExt = GetExt($FileName);
    
	//is the file extension acceptable?
    $FileExtOk = ((count($ExtsOk)==0)||(in_array($TheExt,$ExtsOk)));
    if(!$FileExtOk)
	{
		$ErrorTxt = 'You attempted to upload a file with a disallowed extention. Please only upload files of the following extentions: .'.join(", .",$ExtsOk);
		$ErrNo = 4;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	}
	
	//Is the file too big?
	if($FileSize > $MaxSize)
	{
		$ErrorTxt = 'The file you attempted to upload exceeded the maximum file size of' . ($MaxSize / 1024) . 'kb.';
		$ErrNo = 5;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	} //if($FileSize > $MaxSize)
	
	//Is the file already there?
	if(file_exists($Path.$FileName) && !($OverwriteOk))
	{
		$ErrorTxt = 'The file you attempted to upload already exists. Please specify a new filename.';
		$ErrNo = 6;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	}
	
	//Is the dirctory path there? If not make it
	//Take this out or change it if you do not want to make
	//new directories so easily
	if(!(is_dir($Path)))
	{
		mkdir($Path);
	}

	//Good so far let's upload the file	
	if(!move_uploaded_file($TempFile, $Path.$FileName))
    {
		$ErrorTxt = 'Failed to move file.';
		$ErrNo = 10;
		return ErrorReport($ErrorFunction, $ErrNo, $ErrorTxt, $TempFile, $FileSize, $FileName, $FileType, $Path);
	}
	if (chmod ($Path.$FileName, 0644))		//Remove if your webserver hates you :D
	{
		return false;
	}
	else
	{
		return 11;
	}
    
}
?>