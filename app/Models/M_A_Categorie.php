<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_A_Categorie extends Model
{
    protected $table = "PF_A_CATEGORIE";
    protected $primaryKey = 'id_cat';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
}

?>