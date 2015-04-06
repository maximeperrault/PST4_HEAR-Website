<!DOCTYPE html>
<?php 	

		session_start();
		try {
		//$bdd = new PDO('mysql:host=projectsysteam19.mysql.db;dbname=projectsysteam19', 'projectsysteam19', 'Bigdata19',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		$bdd = new PDO('mysql:host=localhost;dbname=android_api', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		} catch (PDOException $e) {
			echo 'Echec de la connexion : ' . $e->getMessage();
		exit;
		}
		 include 'deconnexion.php';
		?>
<html>
	<head>
		<title>HEAR</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/getApp.css" />
	</head>
	
	<body>

		<header>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
		  <?php if(isset($_SESSION['email'])) { 
		  
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
			  <li><a class="signout">sign out</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
      </nav>
    </header> 

      <div class="container" id="container_getApp">

        <div class="row">
          <div class="col-md-12">
            <div class="platforms">
              <a href="#" class="btn btn-primary inverse scrollpoint sp-effect1">
                <img src="images/android.png" alt="Android logo" class="pull-left">
                <span>Download for</span><br>
                <b>Android</b>
              </a>
            </div>
          </div>
        </div>

      </div>

	</body>
</html>