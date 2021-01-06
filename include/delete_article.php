

<?php
include("../php/init.php");
$dbco = new PDO(DNS, LOGIN, PASSWORD, $options);

    $id_article = $_GET['id'];

    try {
        
        $delArticle = $dbco->prepare("
            DELETE FROM PF_APPARTENIR WHERE id_article = :id_to_del;
            DELETE FROM PF_ARTICLE WHERE id_article = :id_to_del;
        ");

        $delArticle->bindParam(':id_to_del', $id_article);

        $delArticle->execute();
                        

} catch(PDOException $e) {
    echo "error:",$e->getMessage();
}

?>

