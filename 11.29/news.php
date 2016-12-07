<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>北径科技</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-2.2.2.min.js"></script>
<script src="js/script.js"></script>
</head>
<body>
<header id="top">
  <div id="menu"> 菜单 </div>
  <h1>新闻动态</h1>
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
<div id="banner"> <img src="images/4.jpg"> </div>
<div class="top_nav">
<a href="#">主页</a> > <a href="#">新闻动态</a>
</div>
<div id="main">
  <div class="news">
  <?php
    include "include/conn.php";
	$pagenum = 3;
	$page = 1;


  $t = $db->query("select * from news");
  $tot = $t->rowCount();
  if(!empty($_GET['page']))
{
	$page=intval($_GET['page']);
	if($page>=$tot/$pagenum){
		$page--;
	}
	if($page<=1)
		$page =1;
}
  $start = ($page-1)*$pagenum;
$sql = "select * from news limit $start,$pagenum";
$r = $db->query($sql);
  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row)
{
  ?>
    <article>
      <div class="news_img"> <img src="<?php echo $row["img"] ?>"> </div>
      <span class="news_content">
      <h3> <?php echo $row["title"] ?> </h3>
      <p> <?php echo $row["content"] ?> </p>
      </span> </article>
     <?php
}

	 
	 ?>
  
      <div class="ye">
      	<a href="news.php?page=<?php echo $page-1 ?>">上一页</a>  总页数：<?php echo $tot ?>  <a href="news.php?page=<?php echo $page+1 ?>">下一页</a>
      </div>
  </div>
</div>
<div>


</div>
<footer id="footer">
  <ul>
    <li> <img src="images/plugmenu6.png">
      <label>首页</label>
    </li>
    <li> <img src="images/plugmenu5.png">
      <label>分享</label>
    </li>
    <li> <img src="images/plugmenu1.png">
      <label>拨号</label>
    </li>
    <li> <img src="images/plugmenu4.png">
      <label>短信</label>
    </li>
  </ul>
</footer>
</body>
</html>