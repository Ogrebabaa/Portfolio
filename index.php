<?php
    session_start();


    echo    '<!DOCTYPE html>
            <html lang="en" >';

    
    if (empty($_GET['page'])) {
        $pageName = 'index.php';
    } else {
        $pageName = $_GET['page'];
    }

    // traitement de la langue
    $langueDefaut = 'fr';
    $anglais = 'en';

    if (!empty($_GET['langue'])) {
        $_SESSION['langue'] = $_GET['langue'];
    }
    
    if (empty($_SESSION['langue'])) {
        $_SESSION['langue'] = $langueDefaut;
    }
    $current_langue = $_SESSION['langue'];


    
    if (file_exists('xml/traduction.xml')) {
        $bibliotheque = simplexml_load_file('xml/traduction.xml');
        $page = $bibliotheque->$pageName;
        $langue = $page->$current_langue;

    } else {
        echo 'Failed to open';
    }

    if (!empty($pageName)) {
        switch ($pageName) {
            case 'about.php':
                $idPage = 2;
                $link = 'index.php?page=about.php&';
                $pageTitle = "$langue->pagetitle";
                $nextPage = "$langue->nextPage";
                $prevPage = "";
                $nextLink = "index.php";
                $prevLink = "#";
                $adminSide = false;
            break;
            case 'projet.php': 
                $idPage = 3;
                $link = 'index.php?page=projet.php&';
                $pageTitle = "$langue->pagetitle";
                $nextPage = "$langue->nextPage";
                $prevPage = "$langue->prevPage";
                $nextLink = "index.php?page=lab.php";
                $prevLink = "index.php";
                $adminSide = false;
            break;
            case 'lab.php': 
                $idPage = 4;
                $link = 'index.php?page=lab.php&';
                $pageTitle = "$langue->pagetitle";
                $nextPage = "$langue->nextPage";
                $prevPage = "$langue->prevPage";
                $nextLink = "index.php?page=dataPortal.php";
                $prevLink = "index.php?page=projet.php";
                $adminSide = false;
            break;
            case 'contact.php':
                $idPage = 5;
                $link = 'index.php?page=contact.php&';
                $pageTitle = "$langue->pagetitle";
                $nextPage = "";
                $prevPage = "$langue->prevPage";
                $nextLink = "#";
                $prevLink = "index.php?page=dataPortal.php";
                $adminSide = false;
            break;
            case 'dashboard.php':
                $idPage = 6;
                $pageTitle = "Dashboard";
                $adminSide = true;
            break;
            case 'veille.php':
                $idPage = 7;
                $pageTitle = "Veille";
                $adminSide = true;
            break;
            case 'admin.php':
                $link='index.php?page=admin.php';
                $idPage = 8;
                $pageTitle = "Restricted Area";
                $adminSide = false;
                
            break;
            case 'index.php':
                $idPage = 1;
                $link = "index.php?";
                $pageTitle = "$langue->pagetitle";
                $nextPage = "$langue->nextPage";
                $prevPage = "$langue->prevPage";
                $nextLink = "index.php?page=projet.php";
                $prevLink = "index.php?page=about.php";
                $adminSide = false;
                include 'include/particle.php';
            break;
            case 'dataPortal.php':
                $idPage = 9;
                $link = 'index.php?page=dataPortal.php&';
                $pageTitle = "$langue->pagetitle";
                $nextPage = "$langue->nextPage";
                $prevPage = "$langue->prevPage";
                $nextLink = "index.php?page=contact.php";
                $prevLink = "index.php?page=lab.php";
                $adminSide = false;
            default:
                $link = 'index.php';
        break;

                
        }
    }

    include 'include/head.php';
    
    echo "
<body>
        
    

    <div>";
    
        if (!($adminSide)) {
            include 'include/burger_menu.php';
            include 'include/loading_screen.php';
        }

        
        
        
        
        
        $nomPage = 'php/home.php';
			if(isset($_GET['page'])) { 
				if(file_exists(addslashes('php/'.$_GET['page']))) 
					$nomPage = addslashes('php/'.$_GET['page']);
            }
        include($nomPage);         

        if ($adminSide == false) {
            include 'include/arrow_nav.php';
            include 'include/media_menu.php';
            
        }
       
        include 'include/scriptJS.php';
    
    echo '
    </div>
</body>

</html>';

?>