

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
                    <table>
                        <thead>
                            <tr>
                                <th>De </th>
                                <th>Reçu le </th>
                                <th>Objet  </th>
                                <th>Message  </th>
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
                                echo "
                                <tr>
                                    <td>$sender</td>
                                    <td>$date</td>
                                    <td>$obj</td>
                                    <td>$contenu</td>
                                    <td><a class=\"dash_btn_supp_msg\" href=".base_url()."/C_Admin/DeleteMsg/$id_msg><i class=\"fas fa-trash-alt\"></i></a></td>
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
                $content = "Hello World";
                break;
            default:
                $content = "YO";
                break;

        }

        ?>
        
    </main>
</div>
