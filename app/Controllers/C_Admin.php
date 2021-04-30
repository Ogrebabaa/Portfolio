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

    public function Dashboard($onglet="message") {
        $arr_messages = $this->getAllMessage();
        $login = $this->session->get('name');
        $statut = $this->session->get('statut');
        switch($onglet) {
            case "message":
                $data = [
                    "onglet" => $onglet,
                    "arr_messages" => $arr_messages,
                    "name" => $login
                ];
                break;
            case "veille":
                $data = [
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

    private function getAllMessage() {
        $M_Admin = model('App\Models\M_Message');
        $arr_messages = $M_Admin->findAll();
        return $arr_messages;
    }

}
