<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home | CodeIgniter',
        ];
        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data = [
            'title' => 'About | CodeIgniter',
        ];
        return view('pages/about', $data);
    }

    public function contact(): string
    {
        $data = [
            'title' => 'Contact | CodeIgniter',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Jend. Sudirman No. 48',
                    'kota' => 'Jakarta'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. BKR No. 57',
                    'kota' => 'Bandung'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
