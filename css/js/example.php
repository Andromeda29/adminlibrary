<?php 
if(isset($_GET['bookname'])){
	$n = trim(htmlspecialchars($_GET['bookname']));
	$n = strtolower($n);
	$i = strlen($n);
	$bookname = mysql_query('select * from book');
	foreach ($bookname as $value) {
		if($n != ''){
			if(substr($n,0,$i) == substr($value,0,$i))
				echo $value.'<br>';
		}
	}
}
	








 ?>