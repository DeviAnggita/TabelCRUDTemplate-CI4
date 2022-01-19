<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->mhsModel = new MahasiswaModel();
    }

    public function index()
    {
        $mhs = $this->mhsModel->findAll();
        $data = ['mhs' => $mhs]; //$data['mhs'] = $mhs;
        echo view('Mahasiswa/ListMhs', $data);
    }

    public function add()
    {
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status'),
            'prodi' => $this->request->getPost('prodi'),
            'course' => $this->request->getPost('course'),
            'ket' => $this->request->getPost('ket'),
            'fakultas' => $this->request->getPost('fakultas'),
            'universitas' => $this->request->getPost('universitas')
        );
        $this->mhsModel->saveMhs($data);
        echo
        '<script>
            alert("Sukses Tambah Data");
            window.location="' . base_URL('Mahasiswa') . '"
        </script>';
    }

    public function input()
    {
        $periksa = $this->validate(
            [
                'nama' => ['label' => 'nama', 'rules' => 'required|max_length[50]'],
                'username' => ['label' => 'username', 'rules' => 'required|max_length[50]'],
                'password' => ['label' => 'Password', 'rules' => 'required|min_length[6]|max_length[12]'],
                'passconf' => ['label' => 'Passconf', 'rules' => 'required|matches[password]'],
                'email'    => ['label' => 'email', 'rules' => 'required|valid_email'],
                'jenis_kelamin' => ['label' => 'jenis_kelamin', 'rules' => 'required'],
                'alamat' => ['label' => 'alamat', 'rules' => 'required'],
                'tanggal_lahir' => ['label' => 'tanggal_lahir', 'rules' => 'required'],
            ],
            [
                'nama'    => ['required' => 'Anda harus mengisi nama lengkap anda',],
                'username' => ['required'    => 'Anda harus mengisi Username',],
                'password'    => ['required' => 'Password min terdiri dari 6 karakter dan 12 karakter',],
                'passconf'    => ['required' => 'Isikan konfirmasi password dengan benar',],
                'email'    => ['required' => 'Email anda tidak valid',],
                'jenis_kelamin'    => ['required' => 'Silahkan pilih gender Anda',],
                'tanggal_lahir'    => ['required' => 'Memasukkan tanggal lahir Anda',],
            ]
        );

        if (!$periksa) {
            echo view('Mahasiswa/FormMhs', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->add();
            echo view('Mahasiswa/Success');
        }
    }

    public function detail($id)
    {
        $mhs = $this->mhsModel->getMhs($id);
        $data['mhs'] = $mhs;
        echo view('mahasiswa/DetailMahasiswa', $data);
    }

    
    public function delete($id)
    {
        $hapus = $this->mhsModel->delete_data($id);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data');
            return redirect()->to(base_url('Mahasiswa'));
        }
    }
    

    public function edit($id)
    {
        $mhs = $this->mhsModel->find($id);
        if (empty($mhs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $data['mhs'] = $mhs;
        $data['validation'] = \Config\Services::validation();
        return view('Mahasiswa/EditMhs', $data);
    }

    
    public function update($id)
    {
        
        $nama           = $this->request->getPost('nama');
        $username       = $this->request->getPost('username');
        $email          = $this->request->getPost('email');
        $password       = $this->request->getPost('password');
        $tanggal_lahir  = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin  = $this->request->getPost('jenis_kelamin');
        $alamat  = $this->request->getPost('alamat');
        $no_hp  = $this->request->getPost('no_hp');
        $status  = $this->request->getPost('status');
        $prodi  = $this->request->getPost('prodi');
        $course  = $this->request->getPost('course');
        $ket  = $this->request->getPost('ket');

        $data = [
            'nama'          => $nama,
            'username'      => $username,
            'email'         => $email,
            'password'      => $password,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat,
            'no_hp'         => $no_hp,
            'status'        => $status,
            'prodi'         => $prodi,
            'course'        => $course,
            'ket'           => $ket
        ];

        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '*Username Harus diisi'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '*Username Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '*Email Harus diisi',
                    'valid_email' => '*Format Email Harus Valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '*Password Harus diisi',
                    'min_length' => '*Password minimal terdiri dari 8 huruf'
                ]
            ]
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Data');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $ubah = $this->mhsModel->update_data($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengubah Data');
            return redirect()->to(base_url('Mahasiswa'));
        }
    }
}