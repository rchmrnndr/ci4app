<?php 

namespace App\Models;

use CodeIgniter\Model;

class Stok_darahModel extends Model 
{
    protected $table = 'stok_darah';
    protected $primarykey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['gol_darah', 'slug', 'rhesus_pos', 'rhesus_neg'];

    public function getStok($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->tabel('faq');
        // $builder->like('nama', $keyword);

        return $this->table('stok_darah')->like('gol_dar', $keyword);
    }
}