<?php

namespace App\Models;

use CodeIgniter\Model;

class CountModel extends Model
{
    protected $table = 'qr_code';

    protected $allowedFields = ['link_path', 'short_path', 'times'];

    public function getCount($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
}
