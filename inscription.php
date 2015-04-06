<?php



	if(isset($_POST['submit'])) { //si le formulaire d'inscription est fini
	
		if($_POST['name']!=NULL AND $_POST['email']!=NULL AND $_POST['password']!=NULL) { //tous les champs remplis

			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // si le mail est valide
			
				$sql = "SELECT name, email FROM users WHERE name = :name OR email = :email";
                $sql = $bdd->prepare($sql);
				$sql->execute(array('name' => $_POST["name"],'email' => $_POST["email"]));
				$result= $sql->fetch(); //on vérifie si le mail est déjà présent dans la bdd
				
				if($result == 0) { //si il n'y est pas on crée un nouveau profil
					$uuid = uniqid('', true);
					$salt = sha1(rand());
					$salt = substr($salt, 0, 10);
					$encrypted_password = base64_encode(sha1($_POST['password'] . $salt, true) . $salt);
					$requete = "INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES(:uuid, :name, :email, :encrypted_password, :salt, :date)";
					$requete = $bdd->prepare($requete);
					$requete->execute(array('uuid'=>$uuid, 'name'=>$_POST['name'], 'email'=>$_POST['email'], 'encrypted_password'=>$encrypted_password, 'salt'=>$salt, 'date'=>date("Y-m-d H:i:s")));
					
					if($requete) { //si ok on initialise les variables de session => dashboard
					$registerOK=TRUE;
					$registerMSG="inscription reussie";
					header('Location: dashboard.php');
					$_SESSION['email']=$_POST['email'];
				$_SESSION['unique_id'] = $result['unique_id'];
					
					}
			
				}			
			
			}else{ 
			
			$error=TRUE;
			$errorMSG="Votre adresse mail n'est pas valide";
			
		}
		}else{

			$error=TRUE;
			$errorMSG="Veuillez remplir tous les champs";
			}
	}

 ?>