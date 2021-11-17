<!DOCTYPE HTML>
<html>
<head>
	<title>CSV import</title>
</head>

<body>

	<h2>CSV import</h2>
	
	<form method="post" action="upload_action.php" enctype="multipart/form-data">
		
		<fieldset>
			<label>Import CSV File</label>
			<input type="file" name="file_source" id="file_source" class="edt" value="">
		</fieldset>	
		
		<fieldset>
			<label>&nbsp;</label>
			<input type="submit" name="import" value="업로드" />
		</fieldset>
	</form>

	<form method="post" action="down_action.php" enctype="multipart/form-data">
		<fieldset>
			<label>export CSV File</label>
			<label>&nbsp;</label>
			<input type="submit" name="export" value="가져오기" />
		</fieldset>
	</form>

	<form method="post" action="del_action.php" enctype="multipart/form-data">
	<fieldset>
			<label>delect tables</label>
			<label>&nbsp;</label>
			<input type="submit" name="delect" value="모든 사용자 삭제"/>
	</fieldset></form>

</body>
</html>