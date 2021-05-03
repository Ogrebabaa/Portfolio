<?php namespace App\Controllers;

use CodeIgniter\View\View;

class C_Admin extends App
{
	public function index()
	{
		//-----------------------
		
	}

    public function connexion() {
        
        $login = $_POST["adm_username"];
        $passwd = $_POST["adm_passwd"];
        $M_Admin = model('App\Models\M_Admin');
		$data = $M_Admin->find($login);
        $result = [
            "code" =>  0,
            "msg" => ""
        ];

        if ($data == null) {
            $result = [
                "code" =>  0,
                "msg" => "L'utilisateur $login, n'est pas connu de la base de donnée."
            ];
            return redirect()->to(base_url()."/App/admin"); 
        } else {
            $db_passwd = $data["passwd"];
            if (password_verify($passwd, $db_passwd)) {
                
                $sessionData = [
                    "name" => $login,
                    "statut" => "admin"
                ];
                $this->session->set($sessionData);

                return redirect()->to(base_url()."/C_Admin/Dashboard/message"); 
            } else {
                $result = [
                    "code" =>  0,
                    "msg" => "Mot de passe incorrect."
                ];
                return redirect()->to(base_url()."/App/admin"); 
            }
        }

    }

    public function Dashboard($onglet="message", $tri=null) {
       
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
            return redirect()->to(base_url()."/App/admin"); 
        }

    }

    public function Deconnexion() {
        $this->session->destroy();
        return redirect()->to(base_url()."/App/admin"); 
    }

    private function getAllMessage($tri) {
        $M_Admin = model('App\Models\M_Message');

        if ($tri == null) {
            $arr_messages = $M_Admin->findAll();
        } else {
            switch($tri) {
                case 'recent':
                    $arr_messages = $M_Admin->orderBy('date', 'desc')
                                            ->findAll();
                    break;
                case 'ancien':
                    $arr_messages = $M_Admin->orderBy('date', 'asc')
                                            ->findAll();
                    break;
                case 'important':
                    $arr_messages = $M_Admin->orderBy('priorite', 'desc')
                                            ->findAll();
                    break;
                case 'alpha':
                    $arr_messages = $M_Admin->orderBy('email_contact', 'asc')
                                            ->findAll();
                    break;

            }
        }
        return $arr_messages;
    }

    private function getAllArticle($tri) {
        $M_Article = model('App\Models\M_Article');

        if ($tri == null) {
            $arr_articles = $M_Article->findAll();
        } else {
            switch($tri) {
                case 'recent':
                    $arr_articles = $M_Article->orderBy('date_publi', 'desc')
                                            ->findAll();
                    break;
                case 'ancien':
                    $arr_articles = $M_Article->orderBy('date_publi', 'asc')
                                            ->findAll();
                    break;
                case 'alpha':
                    $arr_articles = $M_Article->orderBy('titre', 'asc')
                                            ->findAll();
                    break;

            }
        }

        $index = 0;
        foreach($arr_articles as $article) {
            $id_art = $article["id_article"];
            $arr_cat = $M_Article->getCategories($id_art);

            $arr_articles[$index]['categories'] = $arr_cat;
            $index++;
        }
        return $arr_articles;
    }

    private function getAllCateg() {
        $M_Categ = model('App\Models\M_A_Categorie');
        
        $arr_categ = $M_Categ->findAll();
        
        return $arr_categ;
    }

    public function DeleteMsg($idMsg){
        $statut = $this->session->get('statut');
        if ($statut == "admin") {
            $M_Admin = model('App\Models\M_Message');
            $M_Admin->delete($idMsg);
            return redirect()->to(base_url()."/C_Admin/Dashboard"); 
        } else {
            return redirect()->to(base_url()."/App/accueil"); 
        }
        
    }
    public function DeleteArt($idArt){
        $statut = $this->session->get('statut');
        if ($statut == "admin") {
            $M_Article = model('App\Models\M_Article');
            
            $M_Article->delete($idArt);
            return redirect()->to(base_url()."/C_Admin/Dashboard/veille"); 
        } else {
            return redirect()->to(base_url()."/App/accueil"); 
        }
        
    }
    public function AddArticle(){
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

            return redirect()->to(base_url()."/C_Admin/Dashboard/veille"); 
        } else {
            return redirect()->to(base_url()."/App/accueil"); 
        }
        
    }

}
