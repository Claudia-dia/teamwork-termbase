<?php 
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>术语表</title>
	<style>
		*{
			padding:0;
			margin:0;
		}
		table,tr,td{
			border:1px solid #000;
		}
	</style>
</head>


<div class="main">

<?php
$uid=$_GET['uid'];
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$uid.xls");
 ?>

	<table cellspacing=0 cellpadding=0>
		<tr>
			<td colspan="2" align="center" style="border:1px solid #000;">术语表</td>
		</tr>
		<?php
			
			$sqlres=mysqli_query($conn,"select * from infor where uid=$uid");
			while($resuser=mysqli_fetch_array($sqlres)){
		?>
		<tr>
			<td><?php echo $resuser['chinese'];?></td>
			<td><?php echo $resuser['english'];?></td>
			<td><?php echo $resuser['character'];?></td>
		</tr>
		<?php
			}
		?>
		
	</table>
</div>


</body>
</html>