<?php

		session_start();
	require_once 'database.php';

	$add = $_POST['add'];

//	$_SESSION['add'] = $_POST['add'];

	
	if(strlen($add)<1){

		$_SESSION['e_add'] = "Wpisz notatkę";
		header('Location: index.php');

	} 
	else
	{

		$query = $db->prepare('INSERT INTO notatki VALUES (NULL,:add, now())');
		$query ->bindValue(':add', $add,PDO::PARAM_STR);
			$query->execute();
		header('Location:index.php');

	}
	




?>