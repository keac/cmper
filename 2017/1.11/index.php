<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻中心</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
	$row=array("title"=>"23防守对方就束带结发技术的","date"=>"2017-1-11")
?>
	<ul class="news">
	<?php
	include "conn.php";
		
	$sql="select * from news ";
	$r=$db->query($sql);
	  foreach($r->FetchAll(PDO::FETCH_ASSOC) as $row){
		  
	 
		?>
	
		<li>
		
			<h1><a href="#">
				<?php echo $row['title'] ?>
				</a>
			</h1>
			
			<span>
				<?php echo $row['date'] ?>
			</span>
		</li>
		<?php
		 }
		?>
		
		
		
	</ul>
</body>
</html>