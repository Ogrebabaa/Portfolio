<?php namespace App\Controllers;

use CodeIgniter\View\View;

class App extends BaseController
{
	public function index()
	{
		//-----------------------
		$M_Admin = model('App\Models\M_Admin');
		$data = $M_Admin->find("adminsama");
		
	}

	protected function loadHeader($pageName) {
		$data = [
			"pageTitle" => $pageName
		];
		echo view("blocks/header", $data);
	}

	private function loadFooter() {
		echo view("blocks/footer");
	}

	private function loadNavigation($type, $data) {

		switch ($type) {
			case "d":
				$nextPage = $data["nextPage"];
				$nextLink = $data["nextLink"];

				$result = "
				<div id='a_right' class='arrow '>
					<img id='a_right_img' class='arrow_img' src='". base_url() ."/assets/ICON/arrow_nav_right.svg' alt='right_arrow'>
					<a id='a_right_title' class='next_page_title' href='$nextLink'>
						$nextPage  
					</a>
				</div>";
				break;
			case "g":
				$prevLink = $data["prevLink"];
				$prevPage = $data["prevPage"];

				$result = "
				<div id='a_left' class='arrow '>
					<img id='a_left_img' class='arrow_img' src='". base_url() ."/assets/ICON/arrow_nav_left.svg' alt='left_arrow'>
					<a id='a_left_title' class='next_page_title' href='$prevLink'>
						$prevPage
					</a>
				</div>";
				break;
			case "dg":
				$prevLink = $data["prevLink"];
				$prevPage = $data["prevPage"];

				$nextPage = $data["nextPage"];
				$nextLink = $data["nextLink"];

				$result = "
				<div id='a_left' class='arrow '>
					<img id='a_left_img' class='arrow_img' src='". base_url() ."/assets/ICON/arrow_nav_left.svg' alt='left_arrow'>
					<a id='a_left_title' class='next_page_title' href='$prevLink'>
						$prevPage
					</a>
				</div>

				<div id='a_right' class='arrow '>
					<img id='a_right_img' class='arrow_img' src='". base_url() ."/assets/ICON/arrow_nav_right.svg' alt='right_arrow'>
					<a id='a_right_title' class='next_page_title' href='$nextLink'>
						$nextPage  
					</a>
				</div>";
				break;
			default:
				$result = "Erreur de chargement des flèches.";
		}

		return $result;

	}

	private function loadMenu() {
		echo view("blocks/burger_menu");
	}

	public function accueil() {
		$data = [
			"nextLink" => "projet",
			"nextPage" => lang("accueil_lang.nextPage"), 
			"prevLink" => "apropos",
			"prevPage" => lang("accueil_lang.prevPage")
		];
		$this->loadHeader("accueil");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("dg", $data);
		echo $arrow_nav;

		echo view('V_Accueil');

		$this->loadFooter();
	}

	public function projet() {
		$data = [
			"nextLink" => "lab",
			"nextPage" => lang("projet_lang.nextPage"), 
			"prevLink" => "accueil",
			"prevPage" => lang("projet_lang.prevPage")
		];
		$this->loadHeader("projet");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("dg", $data);
		echo $arrow_nav;

		echo view('V_Projet');

		$this->loadFooter();
	}

	public function apropos() {
		$data = [
			"nextLink" => "accueil",
			"nextPage" => lang("apropos_lang.nextPage"), 
		];
		$this->loadHeader("apropos");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("d", $data);
		echo $arrow_nav;
		
		echo view('V_Apropos');

		$this->loadFooter();
	}

	public function lab() {
		$data = [
			"nextLink" => "veille",
			"nextPage" => "veille", //!fix : traduction pas encore créé pour cette page
			"prevLink" => "projet",
			"prevPage" => "projet" //!fix : traduction pas encore créé pour cette page
		];
		$this->loadHeader("lab");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("dg", $data);
		echo $arrow_nav;
		
		echo view('V_Lab');

		$this->loadFooter();
	}

	public function veille($categ = null) {
		$tri = null;
		$arr_categories = $this->getAllCateg();
		$arr_articles = $this->getAllArticle($tri, $categ);

		$data = [
			"nextLink" => "contact",
			"nextPage" => lang("veille_lang.nextPage"), 
			"prevLink" => "lab",
			"prevPage" => lang("veille_lang.prevPage"),
			"arr_categories" => $arr_categories,
			"arr_articles" => $arr_articles,
			"current_categ" => $categ
		];
		$this->loadHeader("veille");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("dg", $data);
		echo $arrow_nav;
		
		echo view('V_Veille', $data);

		$this->loadFooter();
	}

	public function contact() {
		$data = [
			"prevLink" => "veille",
			"prevPage" => lang("contact_lang.prevPage")
		];
		$this->loadHeader("projet");
		$this->loadMenu();
		$arrow_nav = $this->loadNavigation("g", $data);
		echo $arrow_nav;
		
		echo view('V_Contact');

		$this->loadFooter();
	}

	public function admin() {
		$this->loadHeader("admin");
		$this->loadMenu();
		
		echo view('V_Admin');

		$this->loadFooter();
	}

	protected function getAllArticle($tri = null, $categ = null) {
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

		if ($categ == null) {
			$arr_articles = $M_Article->findAll();
		} else {
			$arr_articles = $M_Article->getArticleFromCat($categ);
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

    protected function getAllCateg() {
        $M_Categ = model('App\Models\M_A_Categorie');
        
        $arr_categ = $M_Categ->findAll();
        
        return $arr_categ;
    }

}
