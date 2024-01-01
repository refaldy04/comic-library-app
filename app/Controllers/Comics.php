<?php

namespace App\Controllers;

use \App\Models\ComicsModel;

class Comics extends BaseController
{
    protected $comicsModel;

    public function __construct()
    {
        $this->comicsModel = new ComicsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Comics List',
            'comics' => $this->comicsModel->getComics()
        ];

        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Comic',
            'comic' => $this->comicsModel->getComics($slug)
        ];

        if(empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic with slug ' . $slug . ' not found');
        };

        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Comic',
            'validation' => session('validation')
        ];

        return view('comics/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => '{field} must be filled',
                    'is_unique' => '{field} already registered'
                ]
            ],
            'author' => 'required',
            'publisher' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            session()->set('validation', $validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->comicsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'New comic has been added.');
        
        return redirect()->to('/comics');
    }

    public function delete($id)
    {
        $this->comicsModel->delete($id);

        session()->setFlashdata('message', 'Comic has been deleted.');

        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Comic',
            'validation' => session('validation'),
            'comic' => $this->comicsModel->getComics($slug)
        ];

        return view('comics/edit', $data);
    }

    public function update($id)
    {
        $oldComic = $this->comicsModel->getComics($this->request->getVar('slug'));

        if($oldComic['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[comics.title]';
        }
        if (!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} must be filled',
                    'is_unique' => '{field} already registered'
                ]
            ],
            'author' => 'required',
            'publisher' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            session()->set('validation', $validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->comicsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'Comic has been updated.');
        
        return redirect()->to('/comics');
    }
}