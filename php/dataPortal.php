<?php 

include("init.php");
$dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
$rss = simplexml_load_file('https://www.google.com/alerts/feeds/15516360233962822684/14973034615877470823') or die("Erreur : impossible de creer l'objet");

?> 


<div class='centered veille-content'> 
    <h2>Veille technologique</h2>
    <hr class='separator'>
    <div class='pres-content-container'>
    
        <div class='veille-presentation'>
            <h3 class='veille-presentation--title'>Qu'est-ce que l'open data ?</h3>
            <p class='veille-presentation--para'>
                Les données ouvertes ou open data sont des données numériques dont l’accès et l’usage sont laissés libres aux usagers. Elles peuvent être d’origine publique ou privée, produites notamment par une collectivité, un service public, un collectif citoyen ou une entreprise. Elles sont diffusées de manière structurée selon une méthode et une licence ouverte garantissant leur libre accès et leur réutilisation par tous, sans restriction technique, juridique ou financière.
                L’ouverture des données est à la fois un mouvement, une philosophie d’accès à l’information, une politique publique et une pratique de publication de données librement accessibles et exploitables. Elle s’inscrit dans une tendance qui considère l’information publique comme un bien commun (tel que défini par Elinor Ostrom) dont la diffusion est d’intérêt public et général.</p>
            <h3 class='veille-presentation--title'>Dans quel but ?</h3>
            <p class='veille-presentation--para'>
                L’ouverture des données d’intérêt public vise à encourager la réutilisation des données au-delà de leur utilisation première par l’administration. En utilisant, directement ou via des applications, des données publiées sur la plateforme data.gouv.fr, on peut par exemple :
            <ul class='veille-presentation--list'>
                <li class='veille-presentation--list_element'>répondre à des questions ;</li>
                <li class='veille-presentation--list_element'>prendre des décisions, pour soi, sa commune, son association ou son entreprise ;</li>
                <li class='veille-presentation--list_element'>bénéficier de services utiles au quotidien : pour se déplacer, éviter le gaspillage alimentaire, connaître les services publics à proximité de son domicile ;</li>
                <li class='veille-presentation--list_element'>encourager la transparence démocratique des institutions et des élus, par exemple : connaître l’utilisation de la réserve parlementaire, les budgets de l’État et des collectivités, les titres de presse aidés par l’État.</li>
            </ul>

            </p>

        </div>
        <div class='article_list'>
        
            <div class='article'>
                <p class='article_content'><strong>Article récent :</strong> </p>
            </div>
    
<?php

$nbArticles = count($rss->entry);

for ($i = 0; $i < $nbArticles; $i++) {
    $entry = $rss->entry[$i];
    $title = $entry->title;
    $link = $entry->link['href'];
    $datePub = $entry->published;
    $content = $entry->content;
    echo "
        <div class='article'>
            <a class='article_link' href='$link'>$title</a>
            <p class='article_content'>$content </p>
        </div>
    
    ";
    
}
?>
        </div>
    </div>

    <div class='article-bdd-container column'>
        <h2>Selection d'articles</h2>
        <hr class='separator'>
        <div class='tri_nav'>
            <!-- Menu de tri - Selection des categories dans la BDD -->
            <?php
            try {
                // recuperation et affchage des categories
                $recupCat = $dbco->prepare(
                    "SELECT id_cat, libelle FROM PF_A_CATEGORIE"
                );
                $recupCat->execute();
                $listCat = $recupCat->fetchAll(PDO::FETCH_ASSOC);

                for ($j = 0; $j < count($listCat); $j++) {
                    $libelle = $listCat[$j]['libelle'];
                    $id_cat = $listCat[$j]['id_cat'];

                    echo "<div id='cat_$id_cat' onclick='selectCat($id_cat); selected(cat_$id_cat);' class='tri_nav_item '>$libelle</div>";

                }

                echo "<div id='cat_all' onclick='selectCat(\"cat_all\"); selected(cat_all);' class='tri_nav_item '>Tout</div>";
                    
            } catch(PDOException $e) {
                echo "error:",$e->getMessage();
            }


            ?>
            
        </div>
        <div id="BDD-list-article-container" class="BDD-list-article-container row">
            
        <!-- Recuperation et affichage des articles -->
            <?php
                // $BDD_list_articles;
                // try {
                //     if (empty($_GET['tri'])) {
                //         // Recupère tout les articles si pas de parametre
                //         $recupArticle = $dbco->prepare(
                //             "SELECT * FROM PF_ARTICLE"
                //         );
                        
                //     } else {
                //         // Recupère les articles de la categorie en parametre
                //         $tri_cat = $_GET['tri'];
                        
                //         $recupArticle = $dbco->prepare(
                //             "SELECT titre, date_publi, AR.id_article, AP.id_cat, lien, contenu FROM `PF_ARTICLE`AR
                //             INNER JOIN PF_APPARTENIR AP ON AR.id_article = AP.id_article
                //             WHERE id_cat = :id_cat
                //             "
                //         );

                //         $recupArticle->bindParam(':id_cat', $tri_cat);
                //     }

                //     $recupArticle->execute();
                //         $BDD_list_articles = $recupArticle->fetchAll(PDO::FETCH_ASSOC);
                //         for ($j = 0; $j < count($BDD_list_articles); $j++) {

                //             //suite a des problème de balise dans les titres : regex pour enlever les <b> </b>
                //             $reg = "/(<b>)|(<\/b>)/i";
                //             $titre = $BDD_list_articles[$j]['titre'];
                //             $res = preg_match($reg, $titre); // return 1 si le pattern match, sinon 0
                //             if ($res === 1) {
                //                 $titre = preg_replace($reg, "", $titre);
                //             }

                //             $id = $BDD_list_articles[$j]['id_article'];
                            
                //             $lien = $BDD_list_articles[$j]['lien'];
                //             $contenu = $BDD_list_articles[$j]['contenu'];
                //             $date_publication = $BDD_list_articles[$j]['date_publi'];
                //             echo "
                //             <div class='panel-article column'>
                //                 <p class='panel-article-title'>\"$titre\"</p>
                //                 <p class='panel-article-date'>Paru le: $date_publication</p>
                //                 <a target='blank' href='$lien' class='panel-article-link'>
                //                     <i class='fas fa-eye'></i>
                //                 </a>
                //             </div>
                //             ";
                //         }
                //         // print_r($BDD_list_articles);

                        

                // } catch(PDOException $e) {
                //     echo "error:",$e->getMessage();
                // }
                
            ?>
        </div>
        
    </div>


</div>  






