

<html>
	<head>
		<meta charset = 'utf-8'>
	</head>
<!-- Simple style -->
<style>
	table
	{
		width: 90%;
		border: 1px solid #444444;
	}
	th, td
	{
		border: 1px solid #444444;
		padding: 10px;
	}	
</style>
	<body>
<?php
		// connect MYSQL
		$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject') or die ("connect fail");
		$query ="select * from board order by number desc";
		$result = $connect->query($query);
		$total = mysqli_num_rows($result);
?>
	
		<h2 align=center>Simple PHP board</h2>	

		<!-- Table start -->	
		<table align = center>
			<thead align = "center">
				<tr>
					<td width = "50" align="center">Number</td>
					<td width = "500" align = "center">Title</td>
					<td width = "100" align = "center">Written by</td>
					<td width = "200" align = "center">Date</td>
					<td width = "50" align = "center">Views</td>
				</tr>
			</thead>
			<tbody>
<?php
				while($rows = mysqli_fetch_assoc($result)) //Repeate number of DB rows
				{ 
?>				      	<tr>
						<td width = "50" align = "center"><?php echo $rows['number']?></td>
						<td width = "500" align = "center">
							<a href = "view.php?number=<?php echo $rows['number']?>"><?php echo $rows['title']?>
						</td>
						<td width = "100" align = "center"><?php echo $rows['id']?></td>
						<td width = "200" align = "center"><?php echo $rows['date']?></td>
						<td width = "50" align = "center"><?php echo $rows['hit']?></td>
					</tr>
<?php
					$total--;
				}
?>
			</tbody>
		</table>
		<!-- Table end -->

		<br>
		<center>
			<button align=center onclick="location.href='./write.php'">Write</button>
		</center>

		<h4 align=center>- Ver.2020.01.05 -<br>made by ubyung1<br><a href = "https://hack2savelife.blogspot.com" target="_blank">https://hack2savelife.blogspot.com</a></h4>
	</body>
</html>
