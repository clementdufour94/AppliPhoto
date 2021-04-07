<?php include "inc\header.php"  ?>
<?php if (isset($_GET['ajout'])) { ?>
    <div class="alert alert-success" role="alert">
        La catégorie à été ajouté!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>
<?php if (isset($_GET['supp'])) { ?>
    <div class="alert alert-danger" role="alert">
        La catégorie à été supprimé !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modération</div>
                <?php $result = $pdo->query("SELECT * FROM admin");
                while ($admin = $result->fetch(PDO::FETCH_OBJ)) { ?>


                    <div class="card-body">


                        <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Nom de la catégorie :</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <h5 class="form-control"><?php  echo $admin->nom_categorie  ?></h5>

                                    </div>
                                </div>
                            </div>



                            <div class="form-group ">
                                <a href="ajoutcate.php?id=<?php echo $admin->id_categorie ?>" class="btn btn-primary btn-lg btn-block login-button" >Ajouter</a>
                                <a href="suppcate.php?id=<?php echo $admin->id_categorie ?>" class="btn btn-danger btn-lg btn-block login-button" >Supprimer</a>
                            </div>
                        </form>


                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php include "inc\/footer.php" ?>