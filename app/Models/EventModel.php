<?php 

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model 
{
    protected $table = 'event';
    protected $primarykey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['event', 'slug', 'desc', 'tanggal'];

    public function getEv($slug = false)
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

        return $this->table('event')->like('event', $keyword)->orLike('tanggal', $keyword);
    }
}