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
                $result = [
                    "code" =>  1,
                    "msg" => "Bonjour $login."
                ];
                return redirect()->to(base_url()."/C_Admin/Dashboard"); 
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

        switch($onglet) {
            case "message":
                $data = [
                    "onglet" => $onglet,
                    "arr_messages" => $arr_messages
                ];
                break;
            case "veille":
                $data = [
                    "onglet" => $onglet,

                ];
                break;
            case "projet":
                $data = [
                    "onglet" => $onglet,

                ];
                break;
            
        }
        

        $this->loadHeader("Dashboard");
		echo view('V_Dashboard', $data);

    }

    private function Dashboard_veille() {
        $data = [
			
		];
        $this->loadHeader("Dashboard");
		echo view('V_Dashboard_Veille', $data);
    }

    private function getAllMessage() {
        $M_Admin = model('App\Models\M_Message');
        $arr_messages = $M_Admin->findAll();
        return $arr_messages;
    }

}
