<?php
	//Connect MYSQL
    include "./lib_my.php";

	$id=$_POST["id"];
	$pw=$_POST["pw"];
    $hashedpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	$email=$_POST["email"];

/*
    echo($id);
    echo("<br>");
    echo($pw);
    echo("<br>");
    echo($hashedpw);
    echo("<br>");
    echo($email);
    echo("<br>");
*/
	//Check the id value exist or not
	$query = "select * from auth_user where id ='$id'";
	$result = mq($query);
	//$result = $connect->query($query);

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
	$query = "insert into auth_user (id, pw, email, date, permit) values ('$id', '$hashedpw', '$email', now(), 0)";
    $result = mq($query);
	//$result = $connect->query($query);

	if($result)
	{
?>
		<script>
			alert('Successfully signed up!');
			location.replace("./login.php");
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


