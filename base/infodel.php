<?php
include("conn.php");
$id=$_GET['id'];
mysqli_query($conn,"delete from infor where id=$id");
echo "<script language=javascript>alert('删除成功！');window.location.href='index.php';</script>";
?>