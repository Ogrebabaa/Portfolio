<?php namespace App\Controllers;

use CodeIgniter\View\View;

class App extends BaseController
{
	public function index()
	{
		//-----------------------
		
	}

	private function loadHeader($pageName) {
		$data = [
			"pageTitle" => $pageName
		];
		echo view("blocks/header", $data);
	}

	private function loadFooter() {
		echo view("blocks/footer");
	}

	private function loadNavigation() {
		
	}

	private function loadMenu() {
		echo view("blocks/burger_menu");
	}

	public function accueil() {
		$this->loadHeader("accueil");
		$this->loadMenu();
		
		echo view('V_Accueil');

		$this->loadFooter();
	}

	public function projet() {
		$this->loadHeader("projet");
		$this->loadMenu();
		
		echo view('V_Projet');

		$this->loadFooter();
	}

	public function apropos() {
		$this->loadHeader("apropos");
		$this->loadMenu();
		
		echo view('V_Apropos');

		$this->loadFooter();
	}

	public function lab() {
		$this->loadHeader("lab");
		$this->loadMenu();
		
		echo view('V_Lab');

		$this->loadFooter();
	}

	public function veille() {
		$this->loadHeader("projet");
		$this->loadMenu();
		
		echo view('V_Veille');

		$this->loadFooter();
	}

	public function contact() {
		$this->loadHeader("projet");
		$this->loadMenu();
		
		echo view('V_Contact');

		$this->loadFooter();
	}

	public function admin() {
		$this->loadHeader("projet");
		$this->loadMenu();
		
		echo view('V_Projet');

		$this->loadFooter();
	}

}
