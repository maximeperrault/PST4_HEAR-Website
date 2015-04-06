<?php 	

		session_start();
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=android_api', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		// $bdd = new PDO('mysql:host=projectsysteam19.mysql.db;dbname=projectsysteam19', 'projectsysteam19', 'Bigdata19',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		} catch (PDOException $e) {
			echo 'Echec de la connexion : ' . $e->getMessage();
		exit;
		}
		 include 'deconnexion.php';
		?>
<!DOCTYPE html>
<html>

    <?php 
	if(isset($_POST["find"])) { $resultat = exec('python plot_chart_site.py "'.$_POST["jour"].' '.$_POST["mois"].' '.$_POST["annee"].'"');} //si la date est rentré on execute le script python
	?>
	<head>
		<title>HEAR</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
	<script src="http://d3js.org/d3.v3.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<style>svg {
  font: 10px sans-serif;
  background-color : white;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.x.axis path {
  display: none;
}

div.tooltip {   
  position: absolute;           
  text-align: center;           
  width: 60px;                  
  height: 28px;                 
  padding: 2px;             
  font: 12px sans-serif;        
  background: lightsteelblue;   
  border: 0px;      
  border-radius: 8px;           
  pointer-events: none;         
}
</style>
			
	</head>	
	<body>
	<header>
	
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
		  <?php if(isset($_SESSION['email'])) { //dashboard ou index (comme index.php)

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
		<?php ?>
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
          <li role="presentation" class="active"><a href="dashboard_followup.php">My follow-up</a></li>
          <li role="presentation"><a href="dashboard_mymap.php">My map</a></li>
          <li role="presentation" id="myProfile"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></li>
          <li role="presentation" id="myProfile">Community</li>
          <li role="presentation"><a href="dashboard_map.php">Map</a></li>
        </ul>
      </div>
	  <form method="POST">
	  <select name="jour" size="1" tabindex="1">
	  <?php 
		for($i=1;$i<=31;$i++) {
			echo "<option value=".$i.">".$i."</option>";
			}
	  ?>
	  </select>
	  <select name="mois" size="1" tabindex="1">
	  <option value="janvier">Janvier</option>
	  <option value="fevrier">Février</option>
	  <option value="mars">Mars</option>
	  <option value="avril">Avril</option>
	  <option value="mai">Mai</option>
	  <option value="juin">Juin</option>
	  <option value="juillet">Juillet</option>
	  <option value="aout">Août</option>
	  <option value="septembre">Septembre</option>
	  <option value="octobre">Octobre</option>
	  <option value="novembre">Novembre</option>
	  <option value="decembre">Décembre</option>
	  </select>
	  <select name="annee" size="1" tabindex="1">
	  <?php 
		for($i=2015;$i<=2030;$i++) {
			echo "<option value=".$i.">".$i."</option>";
			}
	  ?>
	  </select>
	  <input type="submit" name="find" value="Go!"/>
	  </form>
    <svg id="visualisation" width="800" height="450"></svg>
	  <p>
	  <?php if(isset($_POST["find"])) echo $resultat; //on affiche l'analyse du script python
	  ?><p></div>

	</body>
</html>