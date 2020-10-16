<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'form', 'url', 'unggah']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function detailAccount($token = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->getWhere(['token' => $token])
                ->getRow()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_detail_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function editAccount($token = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->getWhere(['token' => $token])
                ->getRow()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_edit_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function restricted_account()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
        ];
        return view('errors/response/view_restricted_cpanel_page', $data);
    }

    public function aktifkan($id = '')
    {
        $data = [
            'is_active' => 1,
            'blokir' => 0
        ];

        $update = $this->account->update($id, $data);

        if ($update) {
            session()->setFlashdata('message', 'Akun Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Berhasil di Blokir!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }

    public function blokir($id = '')
    {
        $update = $this->account->update($id, ['is_active' => 0]);

        if ($update) {
            session()->setFlashdata('message', 'Akun Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Berhasil di Blokir!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }
}
