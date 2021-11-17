
<?php
	//Connect MYSQL
	$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject') or die("fail");

	$id=$_GET["id"];
	$pw=$_GET["pw"];
	$email=$_GET["email"];
	$date = date('Y-m-d H:i:s');

	//Check the id value exist or not
	$query = "select * from auth_user where id ='$id'";
	$result = $connect->query($query);

	//If id value exist
	if(mysqli_num_rows($result)==1)
	{
?>
		<script>
			alert("This ID is already in use.");
			history.back();	
		</script>
<?php
		exit;
	}

	//Save user entered value in DB	
	$query = "insert into auth_user (id, pw, email, date, permit) values ('$id', '$pw', '$email', '$date', 0)";
	#$query = mq("insert into auth_user (id, pw, email, date, permit) values ('".$id."','".$pw."','".$email."','" now(), 0)";
	$result = $connect->query($query);

	if($result)
	{
?>
		<script>
			alert('Successfully signed up!');
			location.replace("./login2.php");
		</script>

<?php
	}
	else
	{
?>
		<script>
			alert("fail");
		</script>
<?php
	}

	mysqli_close($connect);
?>


