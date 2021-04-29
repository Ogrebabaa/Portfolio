<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Article extends Model
{
    protected $table = "PF_Article";
    protected $primaryKey = 'id_article';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
}

?>