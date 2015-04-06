		<?php
		
		session_start(); //ouverture de la session
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=android_api', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //connexion a la bdd local
		// $bdd = new PDO('mysql:host=projectsysteam19.mysql.db;dbname=projectsysteam19', 'projectsysteam19', 'Bigdata19',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //connexion a la bdd distante Ovh
		} catch (PDOException $e) {
			echo 'Echec de la connexion : ' . $e->getMessage(); //msg d'erreur
		exit;
}
		include 'connexion.php'; 
		include 'deconnexion.php';
	?>
<!DOCTYPE html>

<html>
	<head>
		<title>HEAR</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/index.css" />
	</head>
	
	<body>
		<header>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
		  
		  <?php		  //Le lien du logo change en fonction si on est connecté ou pas => dashboard ou index	  
		  if(isset($_SESSION['email'])) { 
		  
		  echo '
            <a class="navbar-brand" href="dashboard.php">
              <img src="images/logo_petit.png" alt="" class="logo">
		 
              Keep an eye on your ears
            </a>';
			} else {
			
			echo '<a class="navbar-brand" href="index.php">
              <img src="images/logo_petit.png" alt="" class="logo">
		 
              Keep an eye on your ears
            </a>';
			} ?>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#about">about</a></li>
              <li><a href="features.php">features</a></li>
              <li><a href="#demo">demo</a></li>
              <li><a class="getApp" href="getApp.php">get app</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
      </nav>
    </header> 

      <div class="container" id="container_login_register">
        <a class="btn btn-primary btn-lg" href="register.php">SIGN UP</a>
        <a class="btn btn-primary btn-lg" id="btn_login"href="login.php">LOG IN</a>
      </div>

	</body>
</html>