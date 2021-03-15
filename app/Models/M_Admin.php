<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Admin extends Model
{
    private $login;
    private $passwd;

    //Exemple de requete 
    // public function getAll() {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('PF_Admin');
    //     $query = $builder->get();
    //     foreach ($query->getResult() as $row) {
    //         echo $row->passwd;
    //     }
    // }

}

?>