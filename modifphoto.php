<?php include "inc\header.php" ?>

<?php


if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $pdo->query("SELECT * FROM article where id='$id' ");
    $photo = $result->fetch(PDO::FETCH_OBJ);


    $login = $_SESSION['pseudo'];

    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
    $data = mysqli_fetch_assoc($requete);
    $aut = $data['id'];

    if ($aut == $photo->auteur_id) {
        if (isset($_POST['newtitre']) and !empty($_POST['newtitre']) and isset($_POST['newtitre'])) {
            $newtitre = htmlspecialchars($_POST['newtitre']);
            $inserttitre = $pdo->query("UPDATE article SET titre = '$newtitre' WHERE id= '$id' ");

            header('Location: modifphotos.php?modif=true');
        }
        if (isset($_POST['newdescription']) and !empty($_POST['newdescription']) and isset($_POST['newdescription'])) {
            $newdescription = htmlspecialchars($_POST['newdescription']);
            $insertdescription = $pdo->query("UPDATE article SET description = '$newdescription' WHERE id= '$id' ");

            header('Location: modifphotos.php?modif=true');
        }
        if (isset($_POST['option']) and !empty($_POST['option']) and isset($_POST['option'])) {

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
            $insertcategorie = $pdo->query("UPDATE article SET categorie = '$cate' WHERE id= '$id' ");




            header('Location: modifphotos.php?modif=true');
        } ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Informations personnel</div>
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="#">

                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Titre</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="newtitre" placeholder="<?php echo "$photo->titre" ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="cols-sm-2 control-label">Description</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <textarea class="form-control" name="newdescription" placeholder="<?php echo "$photo->description" ?>" rows="5"></textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Catégorie : <?php echo "$photo->categorie" ?> </label>




                                    <select class="form-control" name="option">
                                        <option value="nvcatego">Nouvelle catégorie</option>

                                        <?php $result = $pdo->query("SELECT * FROM categorie");
                                        while ($categorie = $result->fetch(PDO::FETCH_OBJ)) { ?>
                                            <option name="catego2" value="<?php echo $categorie->nom_categorie ?>"><?php echo $categorie->nom_categorie ?></option>

                                        <?php } ?>

                                    </select>



                                    <br>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="catego" placeholder="Rentrer le nom de la nouvelle catégorie" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Modifier</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="alert alert-warning" role="alert">
            Une erreur est survenue !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php }
} else { ?>

    <div class="alert alert-warning" role="alert">
        Une erreur est survenue !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php }

?>


<?php include "inc\/footer.php" ?>