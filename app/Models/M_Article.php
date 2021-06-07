<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_Article extends Model
{
    protected $table = "PF_ARTICLE";
    protected $primaryKey = 'id_article';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['titre', 'lien', 'contenu', 'date_publi'];

    public function attributionCateg($arr_categories, $id_new_article) {
        $db = db_connect();
        foreach($arr_categories as $categorie) {
            $sql = "INSERT INTO PF_APPARTENIR (id_cat, id_article)
                    VALUES(?, ?)";
            $db->query($sql, [$categorie, $id_new_article]);
        }
    }

    public function getCategories($id_article) {
        $db = db_connect();
        $sql = "SELECT libelle FROM PF_APPARTENIR A
                INNER JOIN PF_A_CATEGORIE C ON A.id_cat = C.id_cat
                WHERE A.id_article = ?";
        $query = $db->query($sql, [$id_article]);
        return $query->getResultArray();
    }

    public function getArticleFromCat($categ) {
        $db = db_connect();
        $sql = "SELECT * FROM PF_ARTICLE A
                INNER JOIN PF_APPARTENIR AP ON A.id_article = AP.id_article
                INNER JOIN PF_A_CATEGORIE C ON AP.id_cat = C.id_cat
                WHERE C.id_cat = ?";
        $query = $db->query($sql, [$categ]);
        return $query->getResultArray();
    }
}

?>