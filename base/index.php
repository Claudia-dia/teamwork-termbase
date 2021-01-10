<?php 
include("conn.php");
if(isset($_POST['searchcon'])){
	$cona=$_POST['searchcon'];
	$sql=mysqli_query($conn,"select * from information where name like  '%$cona%' "  );
	
}else if(!isset($_POST['searchcon'])){
	$sql=mysqli_query($conn,"select * from information order by id asc");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>术语库</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="inner">
		<div class="a">
			<div class="add">
				<p><a href="add.php">新建</a></p>
			</div>
			<form action="index.php" method="post">
			<div class="search">
				<input type="text" name="searchcon" class="formcss">
				<input type="submit" name="submit" value="搜索" class="formsub">
			</div>
			</form>
		</div>
		<?php 
		
		while($res=mysqli_fetch_array($sql)){
		?>
		<div class="b">
			<div class="ba">
				<p><a href="info.php?id=<?php echo $res['id'];?>"><?php echo $res['name'];?></a></p>
			</div>
			<div class="but">
				<p><a href="edit.php?id=<?php echo $res['id'];?>">修改</a></p>
			</div>
			<div class="but">
			<p><a href="delete.php?id=<?php echo $res['id'];?>">删除</a></p>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</body>
</html>