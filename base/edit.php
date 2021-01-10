<?php
include("conn.php");
$id=$_GET['id'];
$sqlres=mysqli_query($conn,"select * from information where id=$id");
$resuser=mysqli_fetch_array($sqlres);
if(isset($_POST['submit'])){
	if(isset($_POST['name'])){
		$name=$_POST['name'];
	}	
	$ida=$_POST['ida'];
	$sqlu="update `information` set name='$name' where id=$ida ";
	$query=mysqli_query($conn,$sqlu);
	echo  "<script>alert('修改成功!');window.location.href='index.php';</script>";
}else{
?>
<!DOCTYPE html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>术语库</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div class="form">
	<form action="" method="post">
	<div class="per">
		<p><input type="text" name="name" class="formadd" placeholder="请输入术语库名称" value="<?php echo $resuser['name'];?>"></p>
	</div>
	
	<input type="hidden" name="ida" value="<?php echo $resuser['id'];?>">
	<div class="per">
		<input type="submit" name="submit" class="subadd" value="修改">
	</div>
	</form>
</div>
</body>
</html>
<?php
}
?>