<?php
include("../php/init.php");
$dbco = new PDO(DNS, LOGIN, PASSWORD, $options);

    $BDD_list_articles;
    $tri_cat = $_GET['cat'];

    try {
        if ($tri_cat === "cat_all") {
            // Recupère tout les articles si pas de parametre
            $recupArticle = $dbco->prepare(
                "SELECT * FROM PF_ARTICLE"
            );
            
        } else {
            // Recupère les articles de la categorie en parametre

            
            $recupArticle = $dbco->prepare(
                "SELECT titre, date_publi, AR.id_article, AP.id_cat, lien, contenu FROM `PF_ARTICLE`AR
                INNER JOIN PF_APPARTENIR AP ON AR.id_article = AP.id_article
                WHERE id_cat = :id_cat
                "
            );

            $recupArticle->bindParam(':id_cat', $tri_cat);
        }

        $recupArticle->execute();
            $BDD_list_articles = $recupArticle->fetchAll(PDO::FETCH_ASSOC);
            for ($j = 0; $j < count($BDD_list_articles); $j++) {

                //suite a des problème de balise dans les titres : regex pour enlever les <b> </b>
                $reg = "/(<b>)|(<\/b>)/i";
                $titre = $BDD_list_articles[$j]['titre'];
                $res = preg_match($reg, $titre); // return 1 si le pattern match, sinon 0
                if ($res === 1) {
                    $titre = preg_replace($reg, "", $titre);
                }

                $id = $BDD_list_articles[$j]['id_article'];
                
                $lien = $BDD_list_articles[$j]['lien'];
                $contenu = $BDD_list_articles[$j]['contenu'];
                $date_publication = $BDD_list_articles[$j]['date_publi'];
                echo "
                <div class='panel-article column'>
                    <p class='panel-article-title'>\"$titre\"</p>
                    <p class='panel-article-date'>Paru le: $date_publication</p>
                    <a target='blank' href='$lien' class='panel-article-btn panel-article-link'>
                        <i class='fas fa-eye'></i>
                    </a>
                </div>
                ";
            }
            // print_r($BDD_list_articles);

                        

} catch(PDOException $e) {
    echo "error:",$e->getMessage();
}

?>