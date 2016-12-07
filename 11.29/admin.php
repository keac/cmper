<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-2.2.2.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
<header id="top">
  <div id="menu"> 菜单 </div>
  <h1>北径科技</h1>
</header>
<nav id="nav_menu">
  <ul>
    <li> <a href="index.php">首页</a> </li>
    <li> <a href="about.php">关于我们</a> </li>
    <li> <a href="news.php">新闻动态</a> </li>
    <li> <a href="#">首页</a> </li>
    <li> <a href="#">首页</a> </li>
  </ul>
</nav>
<div class="index-top"></div>

<?php
	include "include/conn.php";
if (@$_GET['id']=="add"){
	

?>
<div class="admin">
  <h1>添加新闻</h1>
  <p>
<a href="?">新闻管理</a>
</p>
  <form action="" method="post">
    <div>
      <label>标题</label>
      <input name="title">
    </div>
    <div>
      <label>内容</label>
      <textarea name="content" cols="40" rows="5"></textarea>
    </div>
    <input type="submit" name="button" id="button" value="提交">
  </form>
</div>

<?php
}else{
	
?>
<div class="admin">
<h1> 新闻管理 </h1>
<a href="?id=add">添加新闻</a>
<table>
  <tr class="top"> 
    <td>ID</td>
    <td>标题</td>
    <td>操作</td>
  </tr>
  <?php
 if(isset($_GET['action']) && $_GET['action']=='del'){
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



$r = $db->query("select * from news");
  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row)
{
	
	?>
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php  echo $row['title']?></td>
    <td><a href="admin.php?action=del&id=<?php echo $row['id']?>">删除</a></td>
  </tr>
  <?
}

?>
</table>
</div>
<?php

}
?>
<?php

	if(!empty($_POST['button']))
	{
		$sql = "insert into news (title,content,img) values(:title,:content,:img)";	
		$arr = array(":title"=>$_POST['title'],":content"=>$_POST['content'],":img"=>"images/news.jpg");
		$r = $db->prepare($sql);
	$result = $r->execute($arr);
	if($result==1)
	{
		echo "<script>alert('添加成功！');</script>";
	}else
	{
		echo "<script>alert('添加失败！');</script>";
	}
	
	}
	?>
</body>
</html>