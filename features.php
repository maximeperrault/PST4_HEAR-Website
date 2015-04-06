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
    <link rel="stylesheet" href="css/features.css" />
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
			  <li><a class="signout" href="index.php?deconnexion">sign out</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
      </nav>
    </header> 

      <div class="container" id="features">
        <div class="row">

          <div class="col-md-6 col-sm-6" >
            <img src="images/smartphone.png" alt="" class="logo">
          </div>

          <div class="col-md-6 col-sm-6">
            <div class="media-feature">
              <div class="pull-left media-icon">
                <span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Sound meter</h3>
                  The app sends the value of the sound level arround you.
              </div>
            </div>
            <div class="media-feature">
              <div class="pull-left media-icon">
                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Location</h3>
                  The GPS to localize you, and the app sends your location.
              </div>
            </div>
            <div class="media-feature">
              <div class="pull-left media-icon">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Time</h3>
                  The current time is also send by the app.
              </div>
            </div>
          </div>
                
        </div>        
      </div>

	</body>
</html>