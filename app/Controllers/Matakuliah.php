<?php

namespace App\Controllers;

class Matakuliah extends BaseController
{

    private $rules = [
        'kode' => 'required',
        'nama' => 'required|min_length[3]',
    ];

    private $message = [
        // Errors
        'kode' => [
            'required' => 'Kode harus diisi',
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
        ],
    ];

    public function index()
    {
        echo view('view-form-matakuliah');
    }

    public function cetak()
    {
        $data = [
            'kode' => $_POST['kode'],
            'nama' => $_POST['nama'],
            'sks' => $_POST['sks']
        ];

        echo view('view-data-matakuliah', $data);
    }

    public function cetakwithvalidation()
    {
        helper(['form']);
        if($this->request->getMethod() == 'post') {
            if($this->validate($this->rules, $this->message)) {
                return view('view-data-matakuliah', [
                    'kode' => $this->request->getPost('kode'),
                    'nama' => $this->request->getPost('nama'),
                    'sks' => $this->request->getPost('sks'),
                ]);
            } else {
                $data['validation'] = $this->validator;
            }

            return view('view-form-matakuliah', $data);
        }
    }
}