<!doctype html>
<?php session_start();
ini_set('date.timezone','Asia/Shanghai');
?>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<style>
	*{
		transition: all 1s;
	}
</style>
</head>

<body>
	<?php
	include "conn.php";
		if(empty($_SESSION['id'])){
			
			if(!empty($_POST['submit'])){
				$user=$_POST['user'];
				$password=$_POST['password'];
				$sql="select * from `admin` where `user`= '".$user."' and  `password`= '".$password."'";
				$r=$db->query($sql);
				if($r->rowCount()>=0){
					$_SESSION['id']=$user;
					echo "<script>window.location.reload();</script>";
				}else{
					echo "用户名密码错误";
				}
			}
			?>
	
			<div class="login">
				<form method="post">
					<div><label>用户名</label><input type="text" name="user"></div>
					<div><label>密码</label><input type="text" name="password"></div>
					<div>
						<input name="submit" type="submit" value="登陆">
					</div>
				</form>
			</div>
			
			<?php
		}else{
			if(!empty($_GET['out'])){
			$_SESSION['id']="";
			 exit("<a href='admin.php'> 点击登录</a>");
		}
			echo "欢迎".$_SESSION['id']; echo "<a href='?out=233'>注销</a>"; echo date("Y/m/d");
			/*Del news*/
		if(!empty($_GET['delnews'])){
			$del=intval($_GET['delnews']);
			$sql="DELETE FROM `news` WHERE id=".$_GET['delnews'];
			$r=$db->query($sql);
			if($r->rowCount()>=0){
				 echo " 删除 成功";
			}else{
				 echo " 删除失败";
			}
		}
		
				/*Add news*/
		if(!empty($_GET['addnews'])){
			$title=$_POST['title'];
			$content=$_POST['content'];
			$date=date("Y/m/d");
			$sql="INSERT INTO `news`(`title`, `content`, `date`) VALUES ('".$title."','".$content."','".$date."')";
			$r=$db->query($sql);
			if($r->rowCount()>=0){
				 echo " 添加 成功";
			}else{
				 echo " 添加失败";
			}
		}
			
			/*Del admin*/
			if(!empty($_GET['deladmin'])){
			$del=intval($_GET['deladmin']);
			$sql="DELETE FROM `admin` WHERE id=".$_GET['deladmin'];
			$r=$db->query($sql);
			if($r->rowCount()>=0){
				 echo " 删除 成功";
			}else{
				 echo " 删除失败";
			}
		}
				/*Add admin*/
		if(!empty($_GET['addadmin'])){
			$title=$_POST['user'];
			$content=$_POST['password'];
			$sql="INSERT INTO `admin`(`user`, `password`) VALUES ('".$title."','".$content."')";
			$r=$db->query($sql);
			if($r->rowCount()>=0){
				 echo " 添加 成功";
			}else{
				 echo " 添加失败";
			}
		}
	
	
	?>
		
<div class="admin">
  <h1>新闻管理</h1>
	<table width="525" height="74" border="1">
  <tbody>
    <tr>
      <td width="94">ID</td>
      <td width="306">名称</td>
      <td width="103">操作</td>
    </tr>
   <?php 
	/*
	 *  Show news
	 *  By Keac
	 */
	$sql="select * from news ";
	$r=$db->query($sql);
	  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row){
			
	?>
    <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['title'] ?></td>
		<td><a href="?delnews=<?php echo $row['id']  ?>">删除</a></td>
    </tr>
    <?php
		  
	  }
    ?>
    
  </tbody>
</table>
<div class="add">
	 <h1>新闻添加</h1>
	 <form method="post" action="?addnews=1">
	 <div>标题<input type="text" name="title"></div>
	  <div>内容<textarea name="content"></textarea></div>
	  <input type="submit" name="submit" value="添加">
</form>
</div>


</table>

</div>
	
	<div class="admin">
	
  <h1>管理员管理</h1>
	<table width="525" height="74" border="1">
  <tbody>
    <tr>
      <td width="94">ID</td>
      <td width="306">名称</td>
      <td width="103">操作</td>
    </tr>
   <?php 
	/*
	 *  Show admin
	 *  By Keac
	 */
	$sql="select * from admin ";
	$r=$db->query($sql);
	  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row){
			
	?>
    <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['user'] ?></td>
		<td><a href="?deladmin=<?php echo $row['id']  ?>">删除</a></td>
    </tr>
    <?php
		  
	  }
    ?>
    
  </tbody>
</table>
<div class="add">
	 <h1>管理员添加</h1>
	 <form method="post" action="?addadmin=1">
	 <div> 用户<input type="text" name="user"></div>
	  <div>密码<input type="text" name="password"></div>
	  <input type="submit" name="submit" value="添加">
</form>
</div>


</table>

</div>
		
		<?php
			
		}
	
	?>
</body>
</html>