<?php namespace App\Controllers;

use CodeIgniter\View\View;

class C_Contact extends BaseController
{
	public function index()
	{
		//-----------------------
		
	}

	public function envoyerMessage() {
		$M_Message = model('App\Models\M_Message');
		$M_Contact = model('App\Models\M_Contact');
		$est_deja_contact = false;
		
		if (!empty($_POST)) {
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$statut = $_POST["statut"];
			$email = $_POST["email"];
			$objet = $_POST["objet"];
			$msg = $_POST["msg"];
			

			$dataContact = [
				"email_contact" => $email,
				"nom" => $nom,
				"prenom" => $prenom,
				"statut" => $statut
			];

			$contact_bdd = $M_Contact->find($email);
			if (empty($contact_bdd)) { 
				$M_Contact->insert($dataContact);
			} else {
				$est_deja_contact = true;
			}
			

			$dataMessage = [
				"objet" => $objet,
				"contenu" => $msg,
				"email_contact" => $email,
				"priorite" => 1,
			];

			$M_Message->sendMessage($dataMessage);
			return redirect()->to(base_url("index.php/Site/contact/true/$est_deja_contact"));
		}
	}

}
