<?php namespace App\Controllers;

use CodeIgniter\View\View;

class C_Admin extends BaseController
{
	public function index()
	{
		//-----------------------
		
	}

    public function connection($login, $passwd) {
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
        } else {
            $db_passwd = $data["passwd"];
            if (password_verify($passwd, $db_passwd)) {
                $result = [
                    "code" =>  1,
                    "msg" => "Bonjour $login."
                ];
            } else {
                echo "Mot de passe incorrect.";
                $result = [
                    "code" =>  0,
                    "msg" => "Mot de passe incorrect."
                ];
            }
        }

        return $result;
    }

}
