
<meta charset="utf-8" />
<?php
	//connect MYSQL
	include "./lib_my.php";
	session_start();

	//Entered ID & PW
	$id=$_POST['id'];
	$pw=$_POST['pw'];
	$hashedpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

	//Check the ID's existence
	$query = "select * from auth_user where id='$id'";
	$result = mq($query);
	//$result	= $connect->query($query);
	


	//If the ID exist
	if(mysqli_num_rows($result)==1)
	{
		$row=mysqli_fetch_assoc($result);

		//If PW correct, make SESSION
		//if($row['pw']==$hashedpw)
		if(password_verify($pw, $row['pw']))
		{
			$_SESSION['userid']=$id;
			if(isset($_SESSION['userid']))
			{
?>
				<script>
					alert("Successfully signed in.");
					//location.replace("./login2.php");
					location.replace("./home.php");
				</script>
<?php
			}
			else
			{
				echo "session fail";
			}
		}
		//ID exist but Wrong password
		else
		{
?>
			<script>
				alert("Sorry, Wrong Password.");
				history.back();
			</script>
<?php
		}

	}
	//ID does not exist
	else
	{
?>
		<script>
			alert("Sorry, ID does not exist.");
			history.back();
		</script>
<?php
	}
?>


