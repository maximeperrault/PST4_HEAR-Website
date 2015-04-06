				<?php 
				if(isset($_GET['deconnexion'])) {
				
				session_unset(); //on enleve les variables de session 
				session_destroy();//on ferme la session
				}
				?>