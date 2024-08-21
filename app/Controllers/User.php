<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{


    public function index()
    {
        if (session()->get('level') != 1) {

            return redirect()->to('/errors/html/error_404');
        } else {

            // // load Model User
            $userModel = $this->loadModel('UserModel');

            $data = [

                'title'        => 'User',
                'breadcrumb'    => 'User',
                'users'         => $userModel->selectAllUser(),
            ];
            return view('user/index', $data);
        }
    }

    // create user
    public function create()
    {

        $data = [

            'title'      => 'Tambah Data User',
            'breadcrumb' => 'User / Tambah Data User',
        ];
        return view('user/create', $data);
    }

    // save user
    public function save()
    {

        // load Model User
        $userModel = $this->loadModel('UserModel');

        // set rules and validate
        $rules = [

            'nama'  => [
                'label'  => 'Nama User',
                'rules'   => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'max_length'  => '{field} maksimal 30 karakter'
                ]
            ],
            'username'  => [
                'label'  => 'Username',
                'rules'   => 'required|trim|min_length[3]|is_unique[user.username]|max_length[10]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'is_unique'   => '{field} sudah terdaftar ! pilih kombinasi {field} yang lain',
                    'max_length'  => '{field} maksimal 10 karakter'
                ]
            ],
            'email'  => [
                'label'  => 'Email',
                'rules'   => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'valid_email'  => 'Format {field} tidak valid',
                    'is_unique'  => '{field} sudah terdaftar'
                ]
            ],
            'password'  => [
                'label'  => 'Password',
                'rules'   => 'required|trim|matches[password-konf]',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'matches'  => 'Konfirmasi {field} tidak sesuai',
                ]
            ],
            'password-konf'  => [
                'label'  => 'Konfirmasi Password',
                'rules'   => 'matches[password]',
                'errors' => [
                    'matches'  => '{field} tidak sesuai',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/user/create')->withInput();
        }

        // get data & encripsi password
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data =
            [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $passwordHash,
                'foto' => 'default.png',
                'level' => $this->request->getVar('level'),
                'alamat' => $this->request->getVar('alamat')
            ];

        // insert data to Database
        $userModel->saveUserData($data);

        session()->setFlashdata('flash', 'Data berhasil ditambakan');
        return redirect()->to('/user');
    }

    // edit data user
    public function edit($id)
    {
        // load Model User
        $userModel = $this->loadModel('UserModel');

        $data = [

            'title'         => 'Edit Data User',
            'breadcrumb'    => 'User / Edit Data User',
            'user'          => $userModel->selectAllUser(['id' => $id]),
        ];
        return view('user/edit', $data);
    }

    // update data user
    public function update($id)
    {
        // load Model User
        $userModel = $this->loadModel('UserModel');

        $userDataLama = $userModel->selectAllUser(['id' => $id]);

        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if ($userDataLama['username'] == $username) {

            $rule_username = 'required';
        } else {

            $rule_username = 'required|trim|min_length[3]|is_unique[user.username]|max_length[10]';
        }
        if ($userDataLama['email'] == $email) {

            $rule_email = 'required';
        } else {

            $rule_email = 'required|trim|valid_email|is_unique[user.email]';
        }


        // set rules and validate
        $rules = [

            'nama'  => [
                'label'  => 'Nama User',
                'rules'   => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'max_length'  => '{field} maksimal 30 karakter'
                ]
            ],
            'username'  => [
                'label'  => 'Username',
                'rules'   => $rule_username,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'is_unique'   => '{field} sudah terdaftar ! pilih kombinasi {field} yang lain',
                    'max_length'  => '{field} maksimal 10 karakter'
                ]
            ],
            'email'  => [
                'label'  => 'Email',
                'rules'   => $rule_email,
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'valid_email'  => 'Format {field} tidak valid',
                    'is_unique'  => '{field} sudah terdaftar'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/user/edit/' . $this->request->getVar('id'))->withInput();
        }

        // insert to databse
        $passwordLama = $userDataLama['password'];

        $data =
            [
                'id'   => $id,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $passwordLama,
                'foto' => 'default.png',
                'level' => $this->request->getVar('level'),
                'alamat' => $this->request->getVar('alamat')
            ];

        // insert data to Database
        $userModel->saveUpdateData($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');
        return redirect()->to('/user');
    }


    // delete method
    public function delete($id)
    {
        // load Model User
        $userModel = $this->loadModel('UserModel');

        $userModel->delete(['id' => $id]);
        session()->setFlashdata('flash', 'Data berhasil dihapus');
        return redirect()->to('/user');
    }


    // method profile user
    public function profile()
    {
        $data = [

            'title'        => '',
            'breadcrumb'    => '',
        ];
        return view('user/profile-user', $data);
    }
    // update password
    public function update_password()
    {
        $data = [

            'title'        => '',
            'breadcrumb'    => '',
        ];
        return view('user/update-password', $data);
    }

    // save upsate password
    public function save_update_password()
    {

        // model user
        $userModel = $this->loadModel('UserModel');

        // get data 
        $id_user = session()->get('id');
        $passwor_lama = $this->request->getVar('password_lama');
        $passwor_baru = $this->request->getVar('password_baru');

        $user = $userModel->selectAllUser(['id' => $id_user]);

        // set rule
        $rules = [

            'password_lama' => [
                'rules'  => 'required',
            ],
            'password_baru' => [
                'rules'  => 'required',
            ],

        ];

        if (!$this->validate($rules)) {

            return redirect()->to('/user/update_password')->withInput();
        }

        if (password_verify($passwor_lama, $user['password'])) {

            $data = [
                'id' => $id_user,
                'password' => password_hash($passwor_baru, PASSWORD_DEFAULT),
            ];

            $userModel->save($data);
            session()->setFlashdata('flash', 'Password telah diupdate');
            return redirect()->to('/user/update_password');
        } else {

            session()->setFlashdata('flash_password', 'Password tidak sesuai');
            return redirect()->to('/user/update_password');
        }
    }

    // update sampul
    public function update_sampul()
    {

        $userModel = $this->loadModel('UserModel');

        // set rules
        $rules = [

            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul, 1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'sampul harus diisi',
                    'max_size' => 'ukuran file terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ],
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('/user/profile')->withInput();
        }

        // get name of sampul
        $sampul = $this->request->getFile('sampul');

        // generate nama random
        $nama_sampul = $sampul->getRandomName($sampul);

        // pindahkan gambar pada foler tujuan
        $sampul->move('assets/img/profile-user', $nama_sampul);



        // prepare data
        $data = [
            'id'   => session()->get('id'),
            'foto' => $nama_sampul,
        ];

        // save data
        $userModel->save($data);
        session()->setFlashdata('flash', 'Profile telah diupdate');
        return redirect()->to('/user/profile');
    }
}
