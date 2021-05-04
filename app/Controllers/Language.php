<?php 
namespace App\Controllers;

class Language extends BaseController
{

    public function index()
    {       
    }

    public function switchLanguage() {
        $session = session();
        $locale = $this->request->getLocale();

        if (isset($session->site_lang)) {
            if ($session->site_lang == 'fr') {
                $new_lang = 'en';
            } else {
                $new_lang = 'fr';
            }
        } else {
            if ($locale == 'fr') {
                $new_lang = 'en';
            } else {
                $new_lang = 'fr';
            }
        }
        
        // $session->remove('lang');
        $session->set('site_lang',$new_lang);
        $url = base_url()."/App/accueil";
        return redirect()->back(); 
    }
}

?>