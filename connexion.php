<?php 
	
	if(isset($_POST['submit'])) { //si le formulaire est fini

	// $connexionOK = FALSE;
	// $error = FALSE;
	
	if($_POST['email'] == NULL OR $_POST['password'] == NULL) { //si le nom ou le mail sont vides
	//message erreur => 

	}
		elseif(isset($_POST['email']) AND ($_POST['password'])) { // sinon
	
	$connect="SELECT * FROM users WHERE email=:mail";
	$rqt=$bdd->prepare($connect);
	$rqt->execute(array('mail'=>$_POST['email']));
	$resultat=$rqt->fetch(); //on cherche le mail dans la bdd
	}
	
	if($resultat !=0 OR !$resultat) { //si il y est
	$rqt->closeCursor();
	$mdp_hachee = base64_encode(sha1($_POST['password'].$resultat['salt'], true).$resultat['salt']); //mdp encodee
	
	$connexion = "SELECT * from users WHERE email =:email AND encrypted_password=:encrypted_password";
	$requete = $bdd->prepare($connexion);
	$requete->execute(array('email'=>$_POST['email'], 'encrypted_password'=>$mdp_hachee));
	$result = $requete->fetch(); //on cherche le mail et le mdp correspondant
	}
			if(!$result) { // si il n'y est pas => erreur
			//Message d'erreur =>
			
			$requete->closeCursor();
			}
				else { //sinon on initialise les variables de session et on va au dashboard

				

				$_SESSION['email']=$_POST['email'];
				$_SESSION['unique_id'] = $result['unique_id'];
				header('Location: dashboard_map.php');
				$requete->closeCursor();
						}
				
	}
	
	?>