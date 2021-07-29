<?php 

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model 
{
    protected $table = 'faq';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama', 'komen'];

    // public function getEv($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $slug])->first();
    // }

    public function search($keyword)
    {
        // $builder = $this->tabel('faq');
        // $builder->like('nama', $keyword);

        return $this->table('faq')->like('nama', $keyword)->orLike('id', $keyword);
    }
}