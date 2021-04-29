<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Message extends Model
{
    protected $table = "PF_Message";
    protected $primaryKey = 'id_message';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
}

?>