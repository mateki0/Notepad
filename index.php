<?php
		session_start();

require_once "database.php";

$add = filter_input(INPUT_POST, 'add');
$addTxt = $db->prepare('SELECT * FROM notatki WHERE text= :text');
	$addTxt ->bindValue(':text', $add,PDO::PARAM_STR);
		$addTxt->execute();

//fetch

$txt = $addTxt->fetch();

//
$txtQuery = $db->query('SELECT * FROM notatki');

$text = $txtQuery->fetchAll();

$search = filter_input(INPUT_POST, 'search');

$send = filter_input(INPUT_POST, 'send');




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notepad</title>
	
	<link rel="stylesheet" href="style.css">
	
</head>
<body>

<!--
<div class="container">
<input type="text" class="search" placeholder="Szukaj notatek" name="search" value="" >
	</div>
-->
	<div class="container">
	<form action="add.php" method="post" class="form">
		<input type="text" class="add" placeholder="Add note" name="add"> <br/>
		<input type="submit" value="Send" class="send" name="send">
		</form>
	
	</div>

		<?php
		
		if (isset ($_SESSION['e_add'])){
			echo '<br/><div class="error">'.$_SESSION['e_add'].'</div>';
			unset ($_SESSION['e_add']);
		}else{
		
		foreach ($text as $txt){
			echo '<div><div class="container notes"><div class="note">'.$txt['text'].'</div></div>'.'<p class="date">'.$txt['data'].'<div class="del"><a href="delete.php?user_id='.$txt['id'].'">Delete</a></div></div> ';
		
		}
		
		}
		
	?>


</body>
</html>