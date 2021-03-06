<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        // $this->validation = \Config\Services::validation();
        helper([
            'navbar',
            'navbar_child',
            'alerts',
            'menu',
            'form',
            'url',
            'unggah',
            'tanggal'
        ]);
    }

    public function index()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Admin',
            'nav_title' => 'admin',
            'tabs' => 'admin',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getRow()
        ];

        return view('cpanel/admin/view_admin', $data);
    }

    public function changepassword()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Admin',
            'nav_title' => 'admin',
            'tabs' => 'admin',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/admin/view_change_password', $data);
    }

    public function editAdmin($code = '')
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Admin',
            'nav_title' => 'admin',
            'tabs' => 'admin',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/admin/view_edit_admin', $data);
    }

    public function updateadmin()
    {
        $userModel = new UserModel();

        $email  = $this->request->getPost('email');
        $zoomid = htmlspecialchars(strip_tags($this->request->getPost('zoomid')));

        if ($this->request->getMethod() == 'post') {

            $data = [
                'email' => $email,
                'zoomid' => $zoomid
            ];

            if ($userModel->update($this->request->getPost('id'), $data)) {
                session()->setFlashdata('message', 'Profile Admin Berhasil di Ubah!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('message', 'Profile Admin Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('edit')->withInput();
            }
        }
    }

    public function updatepassword()
    {

        if ($this->request->getMethod() == 'post') {

            $pwd = $this->request->getPost('pass1');
            $password = password_hash($pwd, PASSWORD_DEFAULT);

            $data = ['password' => $password];

            $db      = \Config\Database::connect();
            $builder = $db->table('meeting_users');

            $builder->set('password', $data['password']);
            $builder->where('id', session()->get('id'));
            $updates = $builder->update();

            if ($updates) {
                session()->setFlashdata('message', 'Kata Sandi Berhasil di Ubah!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('message', 'Kata Sandi Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('changepassword')->withInput();
            }
        }
    }
}
