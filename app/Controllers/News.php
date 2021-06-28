<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Controller;
use Exception;



class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();
        $data = [
            'news' => $model->getNews(),
            'title' => 'News archive'
        ];
        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }
    public function view($slug = null)
    {
        $model = new NewsModel();
        $data['news'] = $model->getNews($slug);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Can not find the news item ' . $slug);
        }
        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }
    public function create()
    {
        $model = new NewsModel();
        $request = service('request');

        // $this->validate(['title' => 'require|min_length[3]|max_length[]255','body' => 'required'])

        if ($request->getMethod() === 'post') {
            $model->save([
                'title' => $request->getPost('title'),
                'slug' => url_title($request->getPost('tite'), '-', TRUE),
                'body' => $request->getPost('body')
            ]);
            echo view('news/success');
        } else {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }
}
