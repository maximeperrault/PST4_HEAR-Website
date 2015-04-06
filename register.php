
		<?php
		
		$error=FALSE;
		$registerOK=FALSE;
		$errorMSG='';
		$registerMSG='';
		session_start();
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=android_api', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		//$bdd = new PDO('mysql:host=projectsysteam19.mysql.db;dbname=projectsysteam19', 'projectsysteam19', 'Bigdata19',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		} catch (PDOException $e) {
			echo 'Echec de la connexion : ' . $e->getMessage();
		exit;
}
		include 'inscription.php';
		
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>HEAR</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/login_register.css" />
	</head>
	
	<body>

		<header>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
		  <?php if(isset($_SESSION['email'])) { //dashboard ou index
		  
		  echo '
            <a class="navbar-brand" href="dashboard_map.php">
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
    </header> <p>
<?php if($error=TRUE) {echo $errorMSG;} // affiche les msg d'erreurs
	  if($registerOK=TRUE){ echo $registerMSG;}	//affiche le succès  ?> 	  </p> 
      <div class="container" id="section_register">
        <form role="form" method='POST'>
          <div class="form-group">
            <input type="name" name="name" class="form-control" placeholder="Your name">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your email">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Your password">
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign up</button>
        </form>
      </div>

	</body>
</html>