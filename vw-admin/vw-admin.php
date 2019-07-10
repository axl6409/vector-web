<?php require("vw-config.php"); ?>
<?php require("class/Admin.php"); ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="admin connection">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin connection</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
		
        
        <section id="Connexion" class="connexion">

        	<form class="form_connect" action="" method="POST">
        		<input class="connect_input" type="text" name="login" placeholder="Pseudo">
        		<input class="connect_input" type="password" name="password" placeholder="Password">
        		<input class="connect_input" type="submit" name="submit" placeholder="Submit">
        	</form>

        </section>


	<?php


	if (isset($_POST['login'])) {

		$login = $_POST['login'];

		$admin = new Admin();
		$logAdmin = $admin->getAdminByPseudo($dbconnect, $login);

		$DBpwd = $logAdmin['user_pass'];


		if (password_verify($_POST['password'], $DBpwd)) {

			session_start();

			$_SESSION['admin_id'] = $logAdmin['ID'];
			$_SESSION['admin_pseudo'] = $logAdmin['user_name'];
			$right_notif_connect = "Tu est connecté " .$logAdmin['user_name']. " ! :)";

			print $right_notif_connect;

		} else {

			$wrong_notif_connect = "Wrong login or password.";

			print $wrong_notif_connect;
		}

	}

	?>



    </body>
</html>