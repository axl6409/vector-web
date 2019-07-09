<?php

class Admin {

	public function getAdminByPseudo($dbconnect, $login) {

		$sql = "SELECT * FROM vw_users WHERE user_log = '$login'";

		$stmt = $dbconnect->prepare($sql);

		$stmt->execute();

		$admin = $stmt->fetch();

		return $admin;
	}

	public function logCheck() {

		if(!isset($_SESSION["admin_id"]) || (isset($_SESSION["admin_id"]) && !$_SESSION["admin_id"])) {
			header('LOCATION: ../index.php');

		exit;
		}
	}
}