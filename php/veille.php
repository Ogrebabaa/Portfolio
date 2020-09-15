<?php 

    include("init.php");
    $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);

 if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=admin.php");
    exit;
 }

 $rss = simplexml_load_file('https://www.google.com/alerts/feeds/15516360233962822684/14973034615877470823') or die("Erreur : impossible de creer l'objet");

 $nbArticles = count($rss->entry);



echo "

<span id='pageTitle'>Dashboard</span>
<a id='adminExit' href='index.php?page=deconnexion.php'>
    <i class='fas fa-sign-out-alt'></i>
</a>

<div id='admin-menu'>
    <a href='index.php?page=dashboard.php'>
        <i class='fas fa-envelope'></i>
    </a>

    <a href='index.php?page=veille.php'>
        <i class='fas fa-rss'></i>
    </a>
</div>

<div class='center admin-content column centered'>

<h1> Nouveaux articles: </h1>

    <div class='veille-box'>
        
        <!-- liste des articles -->
";

for ($i = 0; $i < $nbArticles; $i++) {
    $entry = $rss->entry[$i];
    $title = $entry->title;
    $link = $entry->link['href'];
    $datePub = $entry->published;
    $content = $entry->content;

    echo "
    
        <div class=' veille-item row' >
            <div>
                <a class='article_link' href='$link'><strong>Titre: </strong> $title</a>
                <p class='article_content'><strong>Contenu: </strong> $content</p>
            </div>
            
            
            <div class='frm-container'>
                <form class='save-article-frm' action='index.php?page=veille.php&save-article=$i' method='post'>
                <label for='cat$i.[]'>Catégorie(s)</label>
                <select name='cat$i.[]' id='cat$i' class='cat' multiple>
                ";
                    try {
                        // recuperation des categories
                        $recupCat = $dbco->prepare(
                            "SELECT id_cat, libelle FROM PF_A_CATEGORIE"
                        );
                        $recupCat->execute();
                        $listCat = $recupCat->fetchAll(PDO::FETCH_ASSOC);
                        print_r($listCat);
                        for ($j = 0; $j < count($listCat); $j++) {
                            $libelle = $listCat[$j]['libelle'];
                            $id_cat = $listCat[$j]['id_cat'];
                            echo "<option value='$id_cat'>$libelle</option>";
                        }
                    } catch(PDOException $e) {
                        echo "error:",$e->getMessage();
                    }

                    echo "
                </select>

                    <input id='frm-article-btn$i' class='frm-article-btn' type='submit' value='Ajouter'>
                </form>
            </div>
        </div>
    
    ";
    
}
echo "
        
        
    </div>

</div>

";

if (isset($_GET['save-article'])) {
    $id_article = $_GET['save-article'];
    $article_to_save = $rss->entry[(int)$id_article];
    // print_r($article_to_save);
    $a_title = $article_to_save->title;
    $a_link = $article_to_save->link['href'];
    $a_date = $article_to_save->published;
    $a_content = $article_to_save->content;
    $a_date_formated = date('Y-m-d H:i:s', strtotime($a_date));
    // echo "<br> Date de base = $a_date, date formatté = $a_date_formated";
    // echo "<br> Titre : $a_title
    //         <br> lien : $a_link
    //         <br> Date : $a_date
    //         <br> Contenu : $a_content";
    $cat = $_POST['cat'.$id_article.'_'];
    // echo " <br> Categorie :";
    // print_r($cat);

    // test si l'article est deja enregistrer
    $testArticle = $dbco->prepare(
        "SELECT id_article FROM PF_ARTICLE
        WHERE titre = :titre
        AND lien = :lien
        AND contenu = :contenu
        "
    );
      
        $testArticle->bindParam(':titre', $a_title);
        $testArticle->bindParam(':lien', $a_link);
        $testArticle->bindParam(':contenu', $a_content);

        $testArticle->execute();
        $listArticleCor = $testArticle->fetchAll(PDO::FETCH_ASSOC);
        // print_r($listArticleCor);
        if (!empty($listArticleCor)) {
            echo "Article déjà enregistré !";
        } else {
            try {

                // insertion de l'article dans la BDD
                $add_article = $dbco->prepare(
                    "INSERT INTO PF_ARTICLE(titre, lien, contenu, date_publi)
                    VALUES(:titre, :lien, :contenu, :date_publi)
                    "
                );
        
                $add_article->bindParam(':titre', $a_title);
                $add_article->bindParam(':lien', $a_link);
                $add_article->bindParam(':contenu', $a_content);
                $add_article->bindParam(':date_publi', $a_date_formated);
        
                $add_article->execute();
        
                // ajout des categories
                    // recup de l'id de l'article
                    $recup_id_art = $dbco->prepare(
                        "SELECT id_article FROM PF_ARTICLE 
                        WHERE titre = :titre 
                        AND lien = :lien"
                    );
                    $recup_id_art->bindParam(':titre', $a_title);
                    $recup_id_art->bindParam(':lien', $a_link);
        
                    $recup_id_art->execute();
                    $result = $recup_id_art->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($result)) {
                        $id_article_BDD = $result[0]['id_article'];
                    }
                    // pour chaque categ 
                    for ($k = 0; $k < count($cat); $k++) {
                        // insertion sql pour chaque categ
                        $add_categ = $dbco->prepare(
                            "INSERT INTO PF_APPARTENIR(id_article, id_cat)
                            VALUES (:id_article, :id_cat)"
                        );
        
                        // echo $cat[$k];
                        $add_categ->bindParam(':id_article', $id_article_BDD ); 
                        $add_categ->bindParam(':id_cat', $cat[$k]); 
        
                        if (isset($id_article_BDD)) {
                            // echo "Article enregistré !";
                            $add_categ->execute();
                        }
                    }
                    
        
            } catch(PDOException $e) {
                echo "error:",$e->getMessage();
            }
        }
    
}



// print_r($_POST);
?>




