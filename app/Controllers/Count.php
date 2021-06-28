<?php

namespace App\Controllers;

use App\Models\CountModel;
use CodeIgniter\Controller;

class Count extends Controller
{
    public function index($short_path = '')
    {
        $model = new CountModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('qr_code');
        $builder->where('short_path', $short_path);
        $query = $builder->get();
        // print_r($query->getResult());
        foreach ($query->getResult() as $row) {
            $id =  $row->id;
            $data_update = [
                'times' => (($row->times) + 1)
            ];
            $link_path = $row->link_path;
        }

        $model->update($id, $data_update);
        $data = [
            'count' => $model->getCount(),
            'title' => 'Count archive'
        ];
        echo view('templates/header', $data);
        echo view('count/' . $link_path, $data);
        echo view('templates/footer', $data);
    }
}
