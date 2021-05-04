<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Contact extends Model
{
    protected $table = "PF_Contact";
    protected $primaryKey = 'email_contact';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ["email_contact", "nom", "prenom", "statut"];
}

?>