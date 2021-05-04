<?php namespace App\Controllers;

use CodeIgniter\View\View;

class C_Contact extends BaseController
{
	public function index()
	{
		//-----------------------
        print_r($_POST);
		
	}

	public function envoyerMessage() {
		$M_Message = model('App\Models\M_Message');
		$M_Contact = model('App\Models\M_Contact');
		
		if (!empty($_POST)) {
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$statut = $_POST["statut"];
			$email = $_POST["email"];
			$objet = $_POST["objet"];
			$msg = $_POST["msg"];
			

			$dataContact = [
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"statut" => $statut
			];

			$M_Contact->insert($dataContact);

			$dataMessage = [
				"objet" => $objet,
				"contenu" => $msg,
				"email_contact" => $email,
				"priorite" => 1,
			];

			$M_Message->sendMessage($dataMessage);
			return redirect()->to(base_url()."/App/contact");
		}
	}

}
