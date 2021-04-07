<?php include "data\data.php" ?>
<?php 
 if (!empty($_GET)) {

    $requete = mysqli_query($conn, "SELECT * from admin  WHERE id_categorie= " . $_GET['id']);
    $data = mysqli_fetch_assoc($requete);
    $nom_catego = $data['nom_categorie'];

    $data2 = mysqli_fetch_assoc($requete);
    $id_article = $data['id_article'];

    


    $sql = "INSERT INTO categorie (nom_categorie) VALUES ('$nom_catego')";
    $pdo->query("UPDATE article SET categorie = '$nom_catego' WHERE id= '$id_article' ");

    // Execute query 
    mysqli_query($conn, $sql);
    

    $pdo->query("DELETE FROM admin WHERE id_categorie= " . $_GET['id'] );

    header('Location: admin.php?ajout=true');

}
?>