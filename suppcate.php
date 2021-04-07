<?php  include "data\data.php";
 if (!empty($_GET)) {
    $pdo->query("DELETE FROM admin WHERE id_categorie= " . $_GET['id'] );

    header('Location: admin.php?supp=true');

}
?>