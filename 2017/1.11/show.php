<!doctype html>
<html>
<?php
	include "conn.php";
	if(empty($_GET['id'])){
		?>
		<meta charset="utf-8">
<title>没有id</title>
		没有id
		<?php
		 
	}else{
		$id=$_GET['id'];
			$sql="select * from news where id=".$id."";
	$r=$db->query($sql);
	  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row){
	
	
	?>
<head>
<meta charset="utf-8">
<title><?php echo $row['title']  ?></title>
<style>
	h1{
		text-align:center;
	}
</style>
</head>

<body>
<h1>
	<?php echo $row['title']  ?>
</h1>
<?php echo $row['content']  ?>

<br>
<br>
<a href="index.php">返回</a>
</body>
<?php
	  }
		
		}
		?>
</html>