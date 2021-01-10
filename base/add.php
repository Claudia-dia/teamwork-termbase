<?php
include("conn.php");
if(isset($_POST['submit'])){
	if(isset($_POST['name'])){
		$name=$_POST['name'];
	}
	$sql=mysqli_query($conn , "INSERT INTO `information` (`id`, `name`) VALUES ('null',  '$name')");
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
		<p><input type="text" name="name" class="formadd" placeholder="请输入术语库名称"></p>
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