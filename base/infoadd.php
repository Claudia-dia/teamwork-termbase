<?php
include("conn.php");
$uid=$_GET['id'];
if(isset($_POST['submit'])){
	if(isset($_POST['chinese'])){
		$chinese=$_POST['chinese'];
	}if(isset($_POST['english'])){
		$english=$_POST['english'];
	}if(isset($_POST['character'])){
		$character=$_POST['character'];
	}
	$sql=mysqli_query($conn , "INSERT INTO `infor` (`id`, `uid`, `chinese`, `english`, `character`) VALUES ('null',  '$uid',  '$chinese',  '$english',  '$character')");
	echo  "<script>alert('添加成功!');window.location.href='index.php';</script>";
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
		<p><input type="text" name="chinese" class="formadd" placeholder="请输入中文"></p>
	</div>
	<div class="per">
		<p><input type="text" name="english" class="formadd" placeholder="请输入英文"></p>
	</div>
	<div class="per">
		<p><input type="text" name="character" class="formadd" placeholder="请输入词性"></p>
	</div>
	
	<div class="per">
		<input type="submit" name="submit" class="subadd" value="添加">
	</div>
	</form>
</div>
</body>
</html>
<?php
}
?>