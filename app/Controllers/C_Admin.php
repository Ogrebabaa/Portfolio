<?php namespace App\Controllers;

use CodeIgniter\View\View;

class C_Admin extends Site
{
	public function index()
	{
		//-----------------------
		
	}

    public function connexion() {
        $this->loadService();
        $login = $_POST["adm_username"];
        $passwd = $_POST["adm_passwd"];
        $M_Admin = model('App\Models\M_Admin');
		$data = $M_Admin->find($login);

        if ($data == null) {
            return redirect()->to(base_url("index.php/Site/admin")); 

        } else {
            $db_passwd = $data["passwd"];
            if (password_verify($passwd, $db_passwd)) {
                
                $sessionData = [
                    "name" => $login,
                    "statut" => "admin"
                ];
                $this->session->set($sessionData);

                return redirect()->to(base_url("index.php/C_Admin/Dashboard/message")); 
            } else {
                return redirect()->to(base_url("index.php/Site/admin")); 
                
            }
        }

    }
    public function voirMessage($idMsg) {
        $this->loadService();
        $login = $this->session->get('name');
        $statut = $this->session->get('statut');

        if ($statut == "admin") {
            $M_Message = model('App\Models\M_Message');
            $M_Contact = model('App\Models\M_Contact');
            $this->loadHeader("Dashboard");

            $detailMessage = $M_Message->find($idMsg);
            $emailContact = $detailMessage["email_contact"];
            $detailContact = $M_Contact->find($emailContact);

            if (!($detailMessage["lu"])) {
                $dataUp = [
                    'lu' => 1
                ];
                $M_Message->update($idMsg, $dataUp);
            }

            $data = [
                "name" => $login,
                "priorite" => $detailMessage["priorite"],
                "date" => $detailMessage["date"],
                "objet" => $detailMessage["objet"],
                "contenu" => $detailMessage["contenu"],
                "nom" => $detailContact["nom"],
                "prenom" => $detailContact["prenom"],
                "email" => $emailContact,
                "statut" => $detailContact["statut"],
            ];

            echo view('V_Message', $data);
        } else {
            return redirect()->to(base_url("index.php/Site/admin")); 
        }
    }

    public function Dashboard($onglet="message", $tri=null) {
        $this->loadService();
        $login = $this->session->get('name');
        $statut = $this->session->get('statut');
        switch($onglet) {
            case "message":

                $arr_messages = $this->getAllMessage($tri);
                $data = [
                    "onglet" => $onglet,
                    "arr_messages" => $arr_messages,
                    "name" => $login
                ];
                break;
            case "veille":
                $arr_articles = $this->getAllArticle($tri);
                $arr_categ = $this->getAllCateg();
                $data = [
                    "arr_articles" => $arr_articles,
                    "arr_categ" => $arr_categ,
                    "onglet" => $onglet,
                    "name" => $login
                ];
                break;
            case "projet":
                $data = [
                    "onglet" => $onglet,
                    "name" => $login
                ];
                break;
            
        }
        
        if ($statut == "admin") {
            $this->loadHeader("Dashboard");
            echo view('V_Dashboard', $data);
        } else {
            return redirect()->to(base_url("index.php/Site/admin")); 
        }

    }

    public function Deconnexion() {
        $this->loadService();
        $this->session->destroy();
        return redirect()->to(base_url("index.php/Site/admin")); 
    }

    private function getAllMessage($tri) {
        $M_Message = model('App\Models\M_Message');

        if ($tri == null) {
            $arr_messages = $M_Message->findAll();
        } else {
            switch($tri) {
                case 'recent':
                    $arr_messages = $M_Message->orderBy('date', 'desc')
                                            ->findAll();
                    break;
                case 'ancien':
                    $arr_messages = $M_Message->orderBy('date', 'asc')
                                            ->findAll();
                    break;
                case 'important':
                    $arr_messages = $M_Message->orderBy('priorite', 'desc')
                                            ->findAll();
                    break;
                case 'alpha':
                    $arr_messages = $M_Message->orderBy('email_contact', 'asc')
                                            ->findAll();
                    break;

            }
        }
        return $arr_messages;
    }

    public function DeleteMsg($idMsg){
        $this->loadService();
        $statut = $this->session->get('statut');
        if ($statut == "admin") {
            $M_Admin = model('App\Models\M_Message');
            $M_Admin->delete($idMsg);
            return redirect()->to(base_url("index.php/C_Admin/Dashboard")); 
        } else {
            return redirect()->to(base_url("index.php/Site/accueil")); 
        }
        
    }
    public function DeleteArt($idArt){
        $this->loadService();
        $statut = $this->session->get('statut');
        if ($statut == "admin") {
            $M_Article = model('App\Models\M_Article');
            
            $M_Article->delete($idArt);
            return redirect()->to(base_url("index.php/C_Admin/Dashboard/veille")); 
        } else {
            return redirect()->to(base_url("index.php/Site/accueil")); 
        }
        
    }
    public function AddArticle(){
        $this->loadService();
        $statut = $this->session->get('statut');
        if ($statut == "admin") {
            $M_Article = model('App\Models\M_Article');

            if (!empty($_POST)) {
                $titre = $_POST["titre"];
                $lien = $_POST["lien"];
                $contenu = $_POST["contenu"];
                $arr_categories = $_POST["categories"];
                $date_publi = $_POST["date_publi"];
                
                $data = [
                    'id_article' => '',
                    'titre' => $titre,
                    'lien'    => $lien,
                    'contenu'    => $contenu,
                    'date_publi'    => $date_publi,
                ];

                $id_new_art = $M_Article->insert($data);
                $M_Article->attributionCateg($arr_categories, $id_new_art);
            }

            return redirect()->to(base_url("index.php/C_Admin/Dashboard/veille")); 
        } else {
            return redirect()->to(base_url("index.php/Site/accueil")); 
            
        }
        
    }

}
