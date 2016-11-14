<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新闻</title>
</head>

<body>

<form action="addNews.php" method="post">
  <p>标题：
    <input name="subject" type="text" size="25" /><br/>
    内容：
  <textarea name="content" cols="40" rows="5"></textarea>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="提交" />
  </p>
</form>

<?php
include "getDB.php";
if(!empty($_POST['button']))
{
	//$r = $db->exec("insert into news (subject,content,date) values('{$_POST['subject']}','{$_POST['content']}',now())");
	$sql = "insert into news (subject,content,date) values(:subject,:content,now())";
	$arr = array(":subject"=>$_POST['subject'],":content"=>$_POST['content']);
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