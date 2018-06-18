<?php



require_once "database.php";

$id = $_GET['user_id'];
$delTxt = $db->prepare('DELETE FROM notatki WHERE id = :id');
$delTxt ->bindValue(':id', $id, PDO::PARAM_INT);
	
$delTxt->execute();

header('Location:index.php');
