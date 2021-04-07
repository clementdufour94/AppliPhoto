<?php include "inc\header.php" ?>
<?php
$msg = "";

// Si on appuie sur le bouton Enregistrer alors... 
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "assets/images/" . $filename;


    $_POST['titre'] = htmlentities($_POST['titre']);
    $tre = $_POST["titre"];
    $tre = addslashes($tre); //pour ajouter des slashes pour prendre en compte les apostrophes
    $result = $pdo->query("SELECT * FROM categorie");
    $categorie = $result->fetch(PDO::FETCH_OBJ);






    switch ($_POST['option']) {
        case 'nvcatego':
            $_POST['catego'] = htmlentities($_POST['catego']);
            $admin = $_POST["catego"];
            $admin = addslashes($admin);
            $cate = "En cours de modération";



            $req = mysqli_query($conn, "SELECT MAX(id) FROM article ");
            $dat = mysqli_fetch_assoc($req);
            $id_article = $dat['MAX(id)'] + 1;

            $sql = "INSERT INTO admin (nom_categorie, id_article) VALUES ('$admin', '$id_article')";


            // Execute query 
            mysqli_query($conn, $sql);

            break;
        default:
            $_POST['option'] = htmlentities($_POST['option']);
            $nomcatego = $_POST["option"];
            $nomcatego = addslashes($nomcatego);
            $cate = $nomcatego;
    }








    $_POST["description"] = htmlentities($_POST["description"]);
    $desc = $_POST["description"];
    $desc = addslashes($desc); //pour ajouter des slashes pour prendre en compte les apostrophes

    $aut = $_SESSION['pseudo'];


    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$aut'");
    $data = mysqli_fetch_assoc($requete);
    $aut_id = $data['id'];








    // Récuperer toutes les données soumises par le formulaire 
    $sql = "INSERT INTO article (titre, description, categorie, auteur, auteur_id, img, date) VALUES ('$tre','$desc','$cate','$aut', '$aut_id', '$filename', CURRENT_TIMESTAMP )";

    // Execute query 
    mysqli_query($conn, $sql);

    // Déplacer l'image télécharger dans le dossier : assest/images
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image téléchargée avec succès";
    } else {
        $msg = "Erreur lors du téléchargement de l'image";
    }

    header('Location: index.php?ajout=true');
} ?>




























<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un article</div>
                <div class="card-body">

                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Titre</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="titre" />
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Catégorie</label>




                            <select class="form-control" name="option" id="selecteur_categorie">
                                <option value="nvcatego">Nouvelle catégorie</option>

                                <?php $result = $pdo->query("SELECT * FROM categorie");
                                while ($categorie = $result->fetch(PDO::FETCH_OBJ)) { ?>
                                    <option name="catego2" value="<?php echo $categorie->nom_categorie ?>"><?php echo $categorie->nom_categorie ?></option>

                                <?php } ?>

                            </select>



                            <br>
                            <div id='insertion'>
                                <div class="cols-sm-10" id="insertion">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="catego" placeholder="Rentrer le nom de la nouvelle catégorie" />
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Description</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <textarea class="form-control" name="description" rows="5"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Photo</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="file" class="form-control" name="uploadfile" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="upload">Ajouter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(function() {
        $('#selecteur_categorie').change(function() {
            $('#insertion').hide();
            if ($("#selecteur_categorie").val() == 'nvcatego') {
                $('#insertion').show();
            }
        });
    });
</script>

<?php include "inc\/footer.php" ?>