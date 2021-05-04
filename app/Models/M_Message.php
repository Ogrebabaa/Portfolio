<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Message extends Model
{
    protected $table = "PF_Message";
    protected $primaryKey = 'id_message';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    public function sendMessage($data) {
        $objet = $data["objet"];
        $contenu = $data["contenu"];
        $email_contact = $data["email_contact"];
        $priorite = $data["priorite"];

        $db = db_connect();
        $sql = "INSERT INTO PF_Message(objet, contenu, priorite, date, email_contact)
                VALUES(?,?,?,NOW(),?)";
        $db->query($sql, [$objet, $contenu, $priorite, $email_contact]);
        
    }
}


?>