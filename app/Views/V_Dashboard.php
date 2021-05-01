

<div class="wrapper">
    <nav class="dash_sidebar">
        <div class="dash_title_container">
            <h3>Dashboard</h3>
            <h5>Bonjour, <?php echo $name; ?></h5>
        </div>
        
        <ul class="dash_nav_liste">
            <li>
                <a class="<?php if($onglet == "message") echo "dash_selected_nav " ?>" href="<?php echo base_url() ?>/C_Admin/Dashboard"><i class="fas fa-envelope"></i> Message</a>
            </li>
            <li>
                <a class="<?php if($onglet == "veille") echo "dash_selected_nav " ?>" href="<?php echo base_url() ?>/C_Admin/Dashboard/veille"><i class="far fa-newspaper"></i> Veille</a>
            </li>
            <li>
                <a class="<?php if($onglet == "projet") echo "dash_selected_nav " ?>" href="<?php echo base_url() ?>/C_Admin/Dashboard/projet"><i class="fas fa-tasks"></i> Projets</a>
            </li>
        </ul>
        <a id="dash_logout" href="<?php echo base_url() ?>/C_Admin/Deconnexion">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <main class="dash_main_container">
        
        <?php
        switch($onglet) {
            case "message":
                echo "
                <div class=\"dash_message\">
                    <div class='dash_tri_container'>
                        <h3>Trier les messages: </h3>
                        <ul>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/message/recent\">Plus récent</a></li>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/message/ancien\">Plus ancien</a></li>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/message/alpha\">Alphabetique</a></li>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/message/important\">Importance</a></li>
                        </ul>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>De </th>
                                <th>Reçu le </th>
                                <th>Objet  </th>
                                <th>Message  </th>
                                <th>Priorité  </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>";

                            $index = 0;
                            foreach($arr_messages as $message) {
                                $id_msg = $message["id_message"];
                                $sender = $message["email_contact"];
                                $date = $message["date"];
                                $obj = $message["objet"];
                                $contenu = $message["contenu"];
                                $priorite = $message["priorite"];
                                if ($priorite == 1) {
                                    $lb_priorite = "neutre";
                                } else {
                                    $lb_priorite = "important";
                                }
                                echo "
                                <tr>
                                    <td>$sender</td>
                                    <td>$date</td>
                                    <td>$obj</td>
                                    <td>$contenu</td>
                                    <td>$lb_priorite</td>
                                    <td><a class=\"dash_btn_supp\" href=".base_url()."/C_Admin/DeleteMsg/$id_msg><i class=\"fas fa-trash-alt\"></i></a></td>
                                </tr>";
                            
                                $index++;
                            }
                    echo "
                        </tbody>
                        
                    </table>
                </div>
                ";
                break;
            case "veille":
                //gestion des article de la bdd
                echo "
                <div class=\"dash_veille\">
                    <div class='dash_tri_container'>
                        <h3>Trier les articles: </h3>
                        <ul>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/veille/recent\">Plus récent</a></li>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/veille/ancien\">Plus ancien</a></li>
                            <li><a href=\"".base_url()."/C_Admin/Dashboard/veille/alpha\">Alphabetique</a></li>
                        </ul>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre </th>
                                <th>Date de publication </th>
                                <th>Contenu  </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>";

                            $index = 0;
                            foreach($arr_articles as $article) {
                                $id_art = $article["id_article"];
                                $titre = $article["titre"];
                                $lien = $article["lien"];
                                $contenu = $article["contenu"];
                                $date_publi = $article["date_publi"];
                                
                                echo "
                                <tr>
                                    <td>$titre</td>
                                    <td>$date_publi</td>
                                    <td>$contenu</td>
                                    <td>
                                        <a class=\"dash_btn_supp\" href=\"".base_url()."/C_Admin/DeleteArt/$id_art\">
                                            <i class=\"fas fa-trash-alt\"></i>
                                        </a>
                                        <a class=\"dash_btn_go\" target=\"blank\" href=\"$lien\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                    </td>
                                </tr>";
                            
                                $index++;
                            }
                    echo "
                        </tbody>
                        
                    </table>
                </div>";
                // gestion des nouveaux articles
                $rss = simplexml_load_file('https://www.google.com/alerts/feeds/15516360233962822684/14973034615877470823') or die("Erreur : impossible de creer l'objet");
                $nbArticles = count($rss->entry);
                echo "
                <div class=\"dash_veille dash_veille_new\">
                    
                    <div class='dash_tri_container'>
                        <h3>".$nbArticles." nouveaux articles : </h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre </th>
                                <th>Date de publication </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>";
                        

                            for ($i = 0; $i < $nbArticles; $i++) {
                                $entry = $rss->entry[$i];
                                $titre = $entry->title;
                                $lien = $entry->link['href'];
                                $date_publi = $entry->published;
                                $contenu = $entry->content;
                            
                                echo "
                                <tr>
                                    <td>$titre</td>
                                    <td>$date_publi</td>

                                    <td>
                                        
                                        <form action=\"".base_url()."/C_Admin/AddArticle\" method=\"post\">
                                            <input type=\"hidden\" name=\"titre\" value=\"$titre\">
                                            <input type=\"hidden\" name=\"lien\" value=\"$lien\">
                                            <input type=\"hidden\" name=\"contenu\" value=\"$contenu\">
                                            <input type=\"hidden\" name=\"date_publi\" value=\"$date_publi\">
                                            <select name=\"categorie\" id=\"categorie\" multiple>
                                                ";
                                                foreach($arr_categ as $categ) {
                                                    $id_cat = $categ["id_cat"];
                                                    $libelle = $categ["libelle"];
                                                    echo "<option value=\"$id_cat\">$libelle</option>";
                                                }
                                echo "
                                            </select>
                                            <button type=\"submit\">Ajouter</button>
                                        </form>
                                        <a class=\"dash_btn_go\" target=\"blank\" href=\"$lien\">
                                            <i class=\"fas fa-eye\"></i>
                                        </a>
                                    </td>
                                </tr>";
                            
                                $index++;
                            }
                    echo "
                        </tbody>
                        
                    </table>
                </div>";
                break;
            default:
                $content = "YO";
                break;

        }

        ?>

        
    </main>
</div>
