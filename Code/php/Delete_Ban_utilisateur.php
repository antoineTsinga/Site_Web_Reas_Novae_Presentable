<?php 



	if(isset($_POST['formMemberBan'])) 
	{
		include'database.php';
		global $db;

		$ban = $_POST['ban_member'];

		$ban_member = $db->prepare('INSERT INTO banissements (Email) VALUES (?)');
		$ban_member ->execute(array($ban));

		header('Location: gestion_membres.php');
		exit();

	}
?>
