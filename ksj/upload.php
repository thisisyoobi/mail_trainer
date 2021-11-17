<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: write_action.php
Date		: 2020/01/08
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	//If the file exist
	if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "")
	{
		$file = $_FILES['upfile'];
		$upload_directory='./python_modules/upload_db/';
		$file_name = $file['name'];
	
		$name_save = "target.xlsx";
		
		if(move_uploaded_file($file['tmp_name'], $upload_directory.$name_save))
		{
?>
		<script>
			location.replace("./python_modules/upload_db/upload_db.php");
		</script>
<?php
		}
		else
			echo("oh no");
	}
?>


