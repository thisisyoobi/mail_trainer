<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: view.php
Date		: 2020/01/08
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	//Connect MYSQL
	$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject') or die("connect fail");
	$number = $_GET['number'];
	session_start();

	//Check SESSION
	if(!isset($_SESSION['userid']))
	{
?>
		<script>
			alert("Login First!");
			history.back();
		</script>
<?php
		exit;
	}

	//add hit=hit+1 for view count
	$hit = "update board set hit=hit+1 where number=$number";
	$connect->query($hit);
	$query = "select title, content, id, date, hit, name_orig from board where number =$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);

?>
<!-- Simple style -->
<style>
	table
	{
		width: 80%;
		border: 1px solid #444444;
	}
	th, td
	{
		border: 1px solid #444444;
		padding: 10px;
	}
</style>

	<!-- Table start -->
	<table align=center>
		<tr align=center>
			<td colspan="4"><?php echo $rows['title']?></td>
		</tr>
		<tr align=center>
			<td>Written by</td>
			<td><?php echo $rows['id']?></td>
			<td>Views</td>
			<td><?php echo $rows['hit']?></td>
		</tr>
		
		<tr>
			<td colspan="4" valign="top" height="500" style="word-break:break-all">
				<?php echo $rows['content']?>
			</td>
		</tr>
		
		<tr align=center>
<?php
			if(!strcmp($rows['name_orig'],'0'))
			{
?>
				<td colspan="4">
					No File.
				</td>
<?php
			}
			else
			{
?>
				<td colspan="4">
					Uploaded File :
					<a href="./download.php?file_id=<?=$number?>"><?php echo $rows['name_orig']?></a>
<?php
			}
?>
				</td>
		</tr>
	</table>
	<!-- Table end -->


	<!-- Modify & Delete -->
	<br>
	<center>
		<button onclick="location.href='./board_list.php'">Back to List</button>
		<button onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">Modify</button>

		<button onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">Delete</button>
	</center>



