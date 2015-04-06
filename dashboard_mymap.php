<?php 	

		session_start();
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=android_api', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //connexion a la bdd en local
		// $bdd = new PDO('mysql:host=projectsysteam19.mysql.db;dbname=projectsysteam19', 'projectsysteam19', 'Bigdata19',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		} catch (PDOException $e) {
			echo 'Echec de la connexion : ' . $e->getMessage();
		exit;
		}
		 include 'deconnexion.php';
		?>
<!DOCTYPE html>

<html>
<?php $resultat = exec("python map_user.py ".$_SESSION['unique_id']); //on execute le script python?>
	<head>
	
		<title>HEAR</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
			
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
              <li><a class="signout" href="index.php?deconnexion">sign out</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
      </nav>
    </header> 

    <div class="container" id="dashboard">
      <div class="col-md-2 col-sm-2">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" id="myProfile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></li>
          <li role="presentation" id="myProfile">My Profile</li>
          <li role="presentation"><a href="dashboard_followup.php">My follow-up</a></li>
          <li role="presentation" class="active"><a href="dashboard_mymap.php">My map</a></li>
          <li role="presentation" id="myProfile"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></li>
          <li role="presentation" id="myProfile">Community</li>
          <li role="presentation"><a href="dashboard_map.php">Map</a></li>
        </ul>
      </div>
      <div id="map" alt="" class="logo" style="width: 800px; height: 470px;">
	  <p><?php echo $resultat;//on affiche la carte personnelle ?><p></div>
    </div>
      

	</body>
</html>