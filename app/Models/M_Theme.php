<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_V_Theme extends Model
{
    protected $table = "PF_V_Theme";
    protected $primaryKey = 'code_theme';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    

}

?>