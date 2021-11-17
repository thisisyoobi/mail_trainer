<?php
/*
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: download.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
*/

	//Connect MYSQL & download logic
	$number = $_REQUEST['file_id'];
	$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject');
        session_start();
        $query = "select name_save from board where number =$number";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);

	$filepath = './up_file/'.$rows['name_save'];
	$filesize = filesize($filepath);
	$path_parts = pathinfo($filepath);
	$filename = $path_parts['basename'];
	$extension = $path_parts['extension'];

	header("Pragma: public");
	header("Expries: 0");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $filesize");

	readfile($filepath);
?>
