<?php
include("conn.php");
$id=$_GET['id'];
$sqlres=mysqli_query($conn,"select * from infor where id=$id");
$resuser=mysqli_fetch_array($sqlres);
if(isset($_POST['submit'])){
	if(isset($_POST['chinese'])){
		$chinese=$_POST['chinese'];
	}if(isset($_POST['english'])){
		$english=$_POST['english'];
	}if(isset($_POST['character'])){
		$character=$_POST['character'];	
	}
	$ida=$_POST['ida'];
	$sqlua="update `infor` set chinese='$chinese',english='$english',character='$character' where id=$ida ";
	$query=mysqli_query($conn,$sqlua);
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
		<p><input type="text" name="chinese" class="formadd" placeholder="请输入中文" value="<?php echo $resuser['chinese'];?>"></p>
	</div>
	<div class="per">
		<p><input type="text" name="english" class="formadd" placeholder="请输入英文" value="<?php echo $resuser['english'];?>"></p>
	</div>
	<div class="per">
		<p><input type="text" name="character" class="formadd" placeholder="请输入词性" value="<?php echo $resuser['character'];?>"></p>
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