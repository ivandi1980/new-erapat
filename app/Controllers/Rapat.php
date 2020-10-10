<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;
use App\Models\RapatAddModel;
use App\Models\TypeModel;

class Rapat extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->form_validation = \Config\Services::validation();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'zoom', 'form', 'date', 'myforms']);
    }

    public function index()
    {

        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/rapat/view_rapat', $data);
    }

    public function baru()
    {
        $typeModel = new TypeModel();
        $data = [
            'page_title' => 'E-RAPAT - Buat Rapat Baru',
            'nav_title' => 'baru',
            'tabs' => 'rapat',
            'alltype' => $typeModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('cpanel/rapat/view_rapat_baru', $data);
    }

    public function store()
    {
        $userModel = new UserModel();
        $rapatAddModel = new RapatAddModel();

        if ($this->request->getMethod() == 'post') {

            $user = $userModel->asObject()->where('email', session()->get('email'))->first();
            $a = $this->request->getVar('speakers_name');
            $b = $this->request->getVar('participants_name');
            $speakers = implode(',', (array) $a);
            $participants = implode(',', (array) $b);

            $sub_type_id = $this->request->getPost('meeting_subtype');
            $datenow = strtotime(date('Y-m-d'));
            $timenow = strtotime(date("H:i:s"));
            $end_date = strtotime($this->request->getPost('start_date'));
            $end_time = strtotime($this->request->getPost('end_time'));

            $zoomid = ($this->request->getPost('zoomid') ? $this->request->getPost('zoomid') : '0');

            if ($datenow >= $end_date && $timenow >= $end_time && $sub_type_id != '1') {
                $request_status = 3;
            } else {
                $request_status = 0;
            }

            $data = [
                'user_id' => $user->id,
                'sub_type_id' => $sub_type_id,
                'zoom_id' => $zoomid,
                'other_online_id' => htmlspecialchars($this->request->getVar('other_online_id')),
                'speakers_name' => $speakers,
                'members_name' => $participants,
                'unique_code' => uniqid(),
                'agenda' => htmlspecialchars($this->request->getPost('agenda')),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('start_date'),
                'date_requested' =>  date('Y-m-d'),
                'start_time' => $this->request->getPost('start_time'),
                'end_time' => $this->request->getPost('end_time'),
                'request_status' => $request_status
            ];

            $db      = \Config\Database::connect();
            $builder = $db->table('meeting_zoom');

            if ($data['sub_type_id'] == 1) {
                $builder->set('pemakai_id', session()->get('id'));
                $builder->set('date_activated', $data['end_date']);
                $builder->set('start_time', $data['start_time']);
                $builder->set('end_time', $data['end_time']);
                $builder->set('status', 1);
                $builder->where('id', $zoomid);
                $builder->update();
            }

            if ($rapatAddModel->insert($data)) {
                session()->setFlashdata('message', 'Data Rapat Berhasil di Simpan!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('rapat'));
            } else {
                session()->setFlashdata('message', 'Data Rapat Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('baru')->withInput();
            }
        }
    }

    public function detail($code = '')
    {
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' => $rapatModel
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];

        return view('cpanel/rapat/view_rapat_detail', $data);
    }

    public function reschedulle($code = '')
    {
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' => $rapatModel
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];

        return view('cpanel/rapat/view_rapat_reschedulle', $data);
    }

    public function updatestatus($id = 0, $code = '')
    {
        if ($this->request->getMethod() == 'post') {

            $input = $this->validate(['remark_status' => 'required']);

            if (!$input) {
                return redirect()->route('reschedulle/' . $code)->withInput()->with('validation', $this->validator);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'request_status' => $this->request->getPost('request_status'),
                    'end_date' => $this->request->getPost('end_date'),
                    'start_time' => $this->request->getPost('start_time'),
                    'start_time' => $this->request->getPost('start_time'),
                    'end_time' => $this->request->getPost('end_time'),
                    'remark_status' => $this->request->getPost('remark_status'),
                ];

                $db      = \Config\Database::connect();
                $builder = $db->table('meeting');
                $builder->set('request_status', $data['request_status']);
                $builder->set('end_date', $data['end_date']);
                $builder->set('start_time', $data['start_time']);
                $builder->set('end_time', $data['end_time']);
                $builder->set('remark_status', $data['remark_status']);
                $builder->where('id', $id);
                $updates = $builder->update();
                if ($updates) {
                    session()->setFlashdata('message', 'Reschedulle Rapat Berhasil di Update!');
                    session()->setFlashdata('alert-class', 'success');

                    return redirect()->to(base_url('rapat'));
                } else {
                    session()->setFlashdata('message', 'Data Gagal disimpan!');
                    session()->setFlashdata('alert-class', 'alert');

                    return redirect()->route('reschedulle/' . $code)->withInput();
                }
            }
        }
    }

    public function rapatcancel()
    {
        $data = ['page_title' => 'E-RAPAT - Buat Rapat Baru', 'nav_title' => 'baru', 'tabs' => 'rapat'];

        return view('errors/response/view_forbidden_cancel_meeting', $data);
    }

    public function get_media_meeting()
    {
        $id = $this->request->getPost('id_type');

        $db      = \Config\Database::connect();
        $builder = $db->table('view_sub_type');
        $result = $builder->getWhere(['type_id' => $id]);
        if (count($result->getResultArray()) > 0) {
            echo json_encode($result->getResult());
        } else {
            return false;
        }
    }

    public function get_zoomid()
    {
        $id = $this->request->getPost('id_type');

        $db      = \Config\Database::connect();
        $builder = $db->table('view_sub_type');
        $result = $builder->getWhere(['type_id' => $id]);
        if (count($result->getResultArray()) > 0) {
            echo json_encode($result->getResult());
        } else {
            return false;
        }
    }
}
