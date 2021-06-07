<?php 

$rss = simplexml_load_file('https://www.google.com/alerts/feeds/15516360233962822684/14973034615877470823') or die("Erreur : impossible de creer l'objet");

?> 


<div class='centered veille-content'> 
    <h2>Veille technologique</h2>
    <hr class='separator'>

    <!-- <form action="<?php  //echo base_url("index.php/Site/Veille"); ?>" method='POST'>
        <label for="theme">Veuillez choisir un thème de veille : </label>
        <select name="theme" id="theme"> -->
            <?php
                // foreach($arr_themes as $theme) {
                //     $code = $theme["code_theme"];
                //     $libelle = $theme["libelle"];
                //     echo '<option value="'.$code.'">'.$libelle.'</option>';
                // }
            ?>
        <!-- </select>
        <input type="submit" value="Choisir">
    </form> -->
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
            // recuperation et affchage des categories
            foreach($arr_categories as $categorie) {
                $id_cat = $categorie["id_cat"];
                $libelle = $categorie["libelle"];

                if ($current_categ == $id_cat) {
                    echo "<a href='".base_url("index.php/Site/veille/$id_cat")."' id='cat_$id_cat' class='tri_nav_item current_cat'>$libelle</a>";
                } else {
                    echo "<a href='".base_url("index.php/Site/veille/$id_cat")."' id='cat_$id_cat' class='tri_nav_item '>$libelle</a>";
                }
            }
            if ($current_categ == null) {
                echo "<a href='".base_url("index.php/Site/veille")."' class='tri_nav_item current_cat'>Tout</a>";
            } else {
                echo "<a href='".base_url("index.php/Site/veille")."' class='tri_nav_item '>Tout</a>";
            }

            ?>
            
        </div>
        <div>
            <div id="BDD-list-article-container" class="BDD-list-article-container row">
            
            <!-- Recuperation et affichage des articles -->
            

        <?php

            foreach ($arr_articles as $article) {
                $titre = $article["titre"];
                $date_publication = $article["date_publi"];
                $lien = $article["lien"];
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
        ?>
           
           </div>
        </div>
        <div id="BDD-list-article-container" class="BDD-list-article-container row">
            
        <!-- Recuperation et affichage des articles -->

        </div>
        
    </div>


</div>  






