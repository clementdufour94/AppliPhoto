<?php include "inc\header.php" ?>


























<?php //Page d'inscription 

if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['pseudo'], $_REQUEST['email'], $_REQUEST['mdp'])){

	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$nom = stripslashes($_REQUEST['nom']);
    $nom = mysqli_real_escape_string($conn, $nom);

    // récupérer le prénom et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
    $prenom = mysqli_real_escape_string($conn, $prenom);

    // récupérer le téléphone et supprimer les antislashes ajoutés par le formulaire
	$pseudo = stripslashes($_REQUEST['pseudo']);
    $pseudo = mysqli_real_escape_string($conn, $pseudo);
    
    
    
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$mdp = stripslashes($_REQUEST['mdp']);
    $mdp = mysqli_real_escape_string($conn, $mdp);

    

	//requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (nom, prenom, pseudo, email, mdp)
              VALUES ('$nom', '$prenom', '$pseudo', '$email', '".hash('sha256', $mdp)."')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
		    
		header('Location: signin.php'); 
    }
}else{ 
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription</div>
                <div class="card-body">

                    <form class="form-horizontal" method="post" action="#">

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Nom</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" name="nom"  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Prénom</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" name="prenom"   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Pseudo</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" name="pseudo"   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" name="email"  />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Mot de passe</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="password" class="form-control" name="mdp"   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirmation mot de passe</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    
                                    <input type="password" class="form-control" name="confirm"   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">S'inscire</button>
                        </div>
                        <div class="login-register">
                            <a href="signin.php">Déjà Inscrit ?</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>
















<?php include "inc\/footer.php" ?>