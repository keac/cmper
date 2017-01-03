<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<?php
	include "conn.php";
	$sql="select * from news";
	$r=$db->query($sql);
	foreach($r->fetchAll(PDO::FETCH_ASSOC) as $row){
		
		echo $row['title'];
		
	};
	
	?>
    
    
    <form method="post">
    	<input type="text" name="title">
        <input type="text" name="content">
        <input type="submit">
    
    </form>
</body>
</html>