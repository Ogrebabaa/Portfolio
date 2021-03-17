<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Admin extends Model
{
    protected $table = "PF_Admin";
    protected $primaryKey = 'login';

    protected $useAutoIncrement = false;

    protected $returnType = 'array';

}

?>