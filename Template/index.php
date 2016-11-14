<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>

body{
	text-align:center;
}
* { margin:0; padding:0;font-size:12px;}
ul, li { list-style:none;}
a { text-decoration:none;}
.nav { border:2px solid #ccc; border-right:none; overflow:hidden;  }
.nav ul li { float:left;}
.nav ul li a { width:120px; height:40px; text-align:center; line-height:40px; display:block; border-right:2px solid #ccc; background:#eee; color:#666;}
.nav ul li a:hover{ color:#f00; }
.nav  li ul { position:absolute; display:none;}
.nav  li ul li { float:none;}
.nav  li ul li a { border-right:none; border-top:1px dotted #ccc; background:#f5f5f5;}
.nav  li:hover ul{ display:block; }

table{
	margin-left:auto;
	margin-right:auto;
	margin-top:50px;
	border-collapse: collapse;
	border: 1px solid #000;

}
table th{
	border: 1px solid #ccc;
	background-color: #eee;
	padding: 10px;
}
table td{
	border: 1px solid #ccc;
	padding:10px;
}
</style>
</head>
<?php
 include "getDB.php";
 //header("Content-type:text/html;charset=utf-8");
 if(isset($_GET['action']) && $_GET['action']=='del')
 {
	 $sql = "delete from news where Id=:id";
	 $pre = $db->prepare($sql);
	 if($pre->execute(array("id"=>$_GET['id']))==1)
	 {
		 echo "<script>alert('删除成功');</script>";
	 }else
	 {
		 echo "<script>alert('删除失败');</script>";
	 }
 }
?>
<body>
<div class="nav" style="width:500px; margin-left:auto;margin-right:auto; background-color:#CCC">
<ul >
<?php
	//$db->exec("set character set 'utf8'");读取设置
	//$db->exec("set names 'utf8'");写入设置
     $sql = "select * from channel where level = 0";
	 $result = $db->query($sql);
	// while($row =$result->fetch(PDO::FETCH_ASSOC))
	// {
	//	 echo "<li><a href='#' title='{$row['name']}'>{$row['name']}</a></li>";
	// }
	 foreach($result->FetchAll(PDO::FETCH_ASSOC) as $row)
	 {
		 echo "<li><a href='#' title='{$row['name']}'>{$row['name']}</a>";
		  $sql1 = "select * from channel where level = 1 and parentChannelId={$row['Id']}";
	 		$sub_result = $db->query($sql1);
			if($sub_result->rowCount()>0)
			{
				echo "<ul>";
				foreach($sub_result->FetchAll(PDO::FETCH_ASSOC) as $srow)
				{
					
					echo "<li>
					<a href='#' title='{$srow['name']}'>{$srow['name']}</a>
					</li>";
					
				}
				echo "</ul>";
			}
		 
		 echo "</li>";
	 }
?>
</ul>
<div style="clear:both;"></div>
</div>
<a href="addNews.php">添加新闻</a>
<table align="center">
<tr>
<th>标题</th><th>日期</th><th>操作</th></tr>
<?php
$pagenum = 3;
$page = 1;
if(!empty($_GET['page']))
{
	$page=intval($_GET['page']);
	if($page<=1)
		$page =1;
}
$t = $db->query("select * from news");
$tot = $t->rowCount();
$start = ($page-1)*$pagenum;
$sql = "select * from news limit $start,$pagenum";
$r = $db->query($sql);
foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row)
{
	echo "<tr><td>{$row['subject']}</td><td>{$row['date']}</td><td><a href='index.php?action=del&id={$row['Id']}'>删除</a></td></tr>";
}
?>

</table>
<table align="center">
<tr>
<td><a href="index.php?page=<?php echo $page-1 ?>">上页</a></td><td>总共：<?php echo $tot ?>条，当前第<?php echo $page ?>页</td><td><a href="index.php?page=<?php echo $page+1 ?>">下页</a></td></tr>
</table>
</body>
</html>