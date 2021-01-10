<?php 
include("conn.php");
$id=$_GET['id'];
$sqlres=mysqli_query($conn,"select * from information where id=$id");
$resuser=mysqli_fetch_array($sqlres);
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
		<div class="ee">
			<div class="adda">
				<p><a href="index.php">返回</a></p>
			</div>
			<div class="namein">
				<p><?php echo $resuser['name'];?></p>
			</div>
			<div class="adda">
				<p><a href="infoadd.php?id=<?php echo $resuser['id'];?>">添加</a></p>
			</div>
			
		</div>
		<div class="ee">
			<form action="info.php?id=<?php echo $id;?>" method="post" >
			<div class="searcha">
				<input type="text" name="searchcon" class="formcssa">
				<input type="submit" name="submit" value="搜索" class="formsub">
			</div>
			</form>
		</div>
		
		<?php
		$uid=$resuser['id'];

		if(isset($_POST['searchcon'])){
			$cona=$_POST['searchcon'];
			$sqlresa=mysqli_query($conn,"select * from infor where uid=$uid and chinese like  '%$cona%'");
			
		}else if(!isset($_POST['searchcon'])){
			$sqlresa=mysqli_query($conn,"select * from infor where uid=$uid");
		}

		
		while($resusera=mysqli_fetch_array($sqlresa)){
		?>
		<div class="pera">
		<p>中文：<?php echo $resusera['chinese'];?></p>
			<p>英文：<?php echo $resusera['english'];?></p>
			<p>词性：<?php echo $resusera['character'];?></p>
			<p><a href="infoedit.php?id=<?php echo $resusera['id'];?>">修改</a> | <a href="infodel.php?id=<?php echo $resusera['id'];?>">删除</a></p>
		</div>
		<?php
		}
		?>
		<div class="perb">
			<p><a href="excel.php?uid=<?php echo $resuser['id'];?>">导出表格</a></p>
		</div>
		<div class="perb">
			<form action="exc.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file">
				<input type="hidden" name="uid" value="<?php echo $resuser['id'];?>">
				<input type="submit" value="上传">
			</form>
		</div>
	</div>
</body>
</html>