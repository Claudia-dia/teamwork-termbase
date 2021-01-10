<?php
header("Content-type: text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
include("conn.php");
require_once 'excel_reader2.php';

$uid=$_POST['uid'];
//echo ($_FILES['file']['name']) ;

$filePath='upload/'.$_FILES["file"]["name"];//文件存储路径
$name=$_FILES['file']['name'];//名字
$suffixName=explode('.', $name)[1];
if($suffixName=="xls" || $suffixName=="xlsx"){
	if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
		if (!move_uploaded_file($_FILES["file"]["tmp_name"],$filePath)) {
			
		}else{

		}
	} else {
		
	}
}else{
	echo "<a href='index.php'>文件上传格式不正确，请重新上传</a>";
}
$ff='upload/'.$_FILES["file"]["name"];
$data = new Spreadsheet_Excel_Reader("$ff");

//echo  $data->sheets[0]['numRows'];

for ($i = 3; $i <= $data->sheets[0]['numRows']; $i++) {       
$chinese=$data->sheets[0]['cells'][$i][1]; 
$english=$data->sheets[0]['cells'][$i][2];  
$character=$data->sheets[0]['cells'][$i][3];

$sql="INSERT INTO infor (`id`, `uid` , `chinese`, `english`,`character`) VALUES ( null ,'$uid','$chinese','$english','$character')" ;
mysqli_query($conn,$sql);
echo "<script language=javascript>alert('导入成功！');window.location.href='index.php';</script>";
}

?>
