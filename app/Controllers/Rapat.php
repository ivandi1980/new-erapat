<?php

namespace App\Controllers;

use App\Models\UserModel;
use TCPDF;
use App\Models\RapatAddModel;
use App\Models\TypeModel;
use App\Models\SubtypeModel;

class Rapat extends BaseController
{

    public $userModel;
    public function __construct()
    {
        $this->session = session();
        $this->form_validation = \Config\Services::validation();
        helper([
            'navbar',
            'navbar_child',
            'alerts',
            'menu',
            'zoom',
            'form',
            'date',
            'myforms',
            'download',
            'tanggal',
            'download'
        ]);
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $this->userModel,
            'rapat' => $this->rapatonoff->orderBy('id', 'DESC')->findAll()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->orderBy('id', 'DESC')
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_rapat', $dataadmin);
        } else {
            return view('cpanel/rapat/view_rapat', $data);
        }
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
            $a = htmlspecialchars(strip_tags($this->request->getVar('speakers_name')));
            $b = htmlspecialchars(strip_tags($this->request->getVar('participants_name')));
            $speakers = implode(',', (array) $a);
            $participants = implode(',', (array) $b);

            $sub_type_id = $this->request->getPost('meeting_subtype');
            $datenow = strtotime(date('Y-m-d'));
            $timenow = strtotime(date("H:i:s"));
            $end_date = strtotime($this->request->getPost('end_date'));
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
                'agenda' => htmlspecialchars(strip_tags($this->request->getPost('agenda'))),
                'start_date' => $this->request->getPost('end_date'),
                'end_date' => $this->request->getPost('end_date'),
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

    public function edit($code = '')
    {
        $typemodel = new TypeModel();
        $subtypemodel = new SubtypeModel();
        $data = [
            'page_title' => 'E-RAPAT - Edit',
            'nav_title' => 'edit',
            'tabs' => 'rapat',
            'types' => $typemodel->orderBy('id', 'ASC')->findAll(),
            'subtypes' => $subtypemodel->orderBy('id', 'ASC')->findAll(),
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];

        $q = $this->rapatonoff->getWhere(['unique_code' => $code])->getRow();
        if ($q->request_status == 1) {
            return view('errors/response/view_forbidden_cancel_meeting_edit', $data);
        } else {
            return view('cpanel/rapat/view_rapat_edit', $data);
        }
    }

    public function save($id = 0, $code = '')
    {
        $rapatupdatemodel = new RapatAddModel();

        if ($this->request->getMethod() == 'post') {

            $id = $this->request->getPost('id');
            $code = $this->request->getPost('code');
            $a = htmlspecialchars(strip_tags($this->request->getPost('members_name')));
            $b = htmlspecialchars(strip_tags($this->request->getPost('speakers_name')));
            $speakers = implode(',', (array) $a);
            $participants = implode(',', (array) $b);


            $data = [
                'sub_type_id' => $this->request->getPost('meeting_subtype'),
                'members_name' => $speakers,
                'speakers_name' => $participants,
                'other_online_id' => htmlspecialchars($this->request->getVar('other_online_id')),
                'agenda' => htmlspecialchars(strip_tags($this->request->getPost('agenda'))),
            ];

            $save = $rapatupdatemodel->update($id, $data);
            if ($save) {
                session()->setFlashdata('message', 'Data Rapat Berhasil di Simpan!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('detail/' . $code));
            } else {
                session()->setFlashdata('message', 'Data Rapat Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('edit/' . $code)->withInput();
            }
        }
    }

    public function detail($code = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];

        return view('cpanel/rapat/view_rapat_detail', $data);
    }

    public function reschedulle($code = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'status' => $this->status->orderBy('id', 'DESC')->findAll(),
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];

        $q = $this->rapatonoff->getWhere(['unique_code' => $code])->getRow();
        if ($q->request_status == 1) {
            return view('errors/response/view_forbidden_cancel_meeting_reschedulle', $data);
        } else {
            return view('cpanel/rapat/view_rapat_reschedulle', $data);
        }
    }

    public function updatestatus($id = 0, $code = '')
    {
        if ($this->request->getMethod() == 'post') {

            // $input = $this->validate(['remark_status' => 'required']);

            // if (!$input) {
            //     return redirect()->route('reschedulle/' . $code)->withInput()->with('validation', $this->validator);
            // } else {

            $db      = \Config\Database::connect();
            $id = $this->request->getPost('id');
            $zoomid = $this->request->getPost('zoomid');
            $subtypeid = $this->request->getPost('sub_type_id');
            $request_status = '3';
            $datenow = strtotime(date('Y-m-d'));
            $timenow = strtotime(date("H:i:s"));
            $end_date = strtotime($this->request->getPost('end_date'));
            $end_time = strtotime($this->request->getPost('start_time'));
            $end_time = strtotime($this->request->getPost('end_time'));

            if ($datenow >= $end_date && $timenow >= $end_time) {
                $data = [
                    'request_status' => $request_status,
                    'end_date' => $this->request->getPost('end_date'),
                    'start_time' => $this->request->getPost('start_time'),
                    'end_time' => $this->request->getPost('end_time'),
                    'remark_status' => htmlspecialchars(strip_tags($this->request->getPost('remark_status'))),
                ];
            } else {
                $data = [
                    'request_status' => $this->request->getPost('request_status'),
                    'end_date' => $this->request->getPost('end_date'),
                    'start_time' => $this->request->getPost('start_time'),
                    'end_time' => $this->request->getPost('end_time'),
                    'remark_status' => htmlspecialchars(strip_tags($this->request->getPost('remark_status'))),
                ];
            }

            if ($subtypeid == 1) {
                if ($data['request_status'] == 1) {
                    $builder = $db->table('meeting_zoom');
                    $builder->set('pemakai_id', session()->get('id'));
                    $builder->set('date_activated', $data['end_date']);
                    $builder->set('start_time', $data['start_time']);
                    $builder->set('end_time', $data['end_time']);
                    $builder->set('status', 0);
                    $builder->where('idzoom', $zoomid);
                    $builder->update();
                } else {
                    $builder = $db->table('meeting_zoom');
                    $builder->set('pemakai_id', session()->get('id'));
                    $builder->set('date_activated', $data['end_date']);
                    $builder->set('start_time', $data['start_time']);
                    $builder->set('end_time', $data['end_time']);
                    $builder->where('idzoom', $zoomid);
                    $builder->update();
                }
            }

            $builder = $db->table('meeting');
            $builder->set('request_status', $data['request_status']);
            $builder->set('start_date', $data['end_date']);
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
            // }
        }
    }

    public function rapatcancel()
    {
        $data = ['page_title' => 'E-RAPAT - Buat Rapat Baru', 'nav_title' => 'baru', 'tabs' => 'rapat'];

        return view('errors/response/view_forbidden_cancel_meeting', $data);
    }

    public function uploadundangan($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->orderBy('id', 'DESC')
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_undangan', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_undangan', $data);
        }
    }

    public function undanganaction()
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('nama');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Undangan Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('uploadundangan/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload' => str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload', $data['files_upload']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Undangan Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('rapat'));
        }
    }

    public function uploadnotulen($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->orderBy('id', 'DESC')
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_notulen', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_notulen', $data);
        }
    }

    public function notulenaction()
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Notulen Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('uploadnotulen/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload1' => str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload1', $data['files_upload1']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Notulen Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('rapat'));
        }
    }

    public function uploadabsensi($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_absensi', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_absensi', $data);
        }
    }

    public function absensiaction()
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');
        $idzoom = $this->request->getPost('idzoom');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Notulen Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('uploadabsensi/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload2' =>  str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload2', $data['files_upload2']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Notulen Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            $db      = \Config\Database::connect();
            $builder = $db->table('meeting_zoom');
            $builder->set('status', 0);
            $builder->where('idzoom', $idzoom);
            $builder->update();

            return redirect()->to(base_url('rapat'));
        }
    }

    public function uploadtambahan1($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_tambahan1', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_tambahan1', $data);
        }
    }

    public function uploadtambahan2($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_tambahan2', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_tambahan2', $data);
        }
    }

    public function uploadtambahan3($code = '')
    {
        $userModel = new UserModel();
        $dataadmin = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ];
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code, 'user_id' => session()->get('id')])
                ->getRow()
        ];

        if (session()->get('role_id') == 1) {
            return view('cpanel/rapat/view_upload_tambahan3', $dataadmin);
        } else {
            return view('cpanel/rapat/view_upload_tambahan3', $data);
        }
    }

    public function tambahanaction1($code = '')
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Notulen Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('tambahanaction1/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload3' =>  str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload3', $data['files_upload3']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Notulen Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('detail/' . $code));
        }
    }

    public function tambahanaction2($code = '')
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Notulen Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('tambahanaction2/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload4' => str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload4', $data['files_upload4']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Notulen Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('detail/' . $code));
        }
    }

    public function tambahanaction3($code = '')
    {
        $database = \Config\Database::connect();
        $db = $database->table('meeting');

        $code = $this->request->getPost('code');
        $id = $this->request->getPost('id');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            session()->setFlashdata('message', 'Notulen Gagal di Upload!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->route('tambahanaction3/' . $code)->withInput();
        } else {
            $img = $this->request->getFile('file');
            $img->move(ROOTPATH . 'uploads');

            $data = [
                'files_upload5' => str_replace(" ", "_", $img->getName()),
                'type'  => $img->getClientMimeType()
            ];

            $db->set('files_upload5', $data['files_upload5']);
            $db->where('id', $id);
            $db->update();
            session()->setFlashdata('message', 'Notulen Berhasil di Upload!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('rapat'));
        }
    }

    public function downloadundangan($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload']);
        } else {
            return false;
        }
    }

    public function downloadnotulen($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload1']);
        } else {
            return false;
        }
    }

    public function downloadabsensi($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload2']);
        } else {
            return false;
        }
    }

    public function downloadtambahan1($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload3']);
        } else {
            return false;
        }
    }

    public function downloadtambahan2($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload4']);
        } else {
            return false;
        }
    }

    public function downloadtambahan3($code = '')
    {
        $data = ['rapat' => $this->rapatonoff->getWhere(['unique_code' => $code])];

        if (count($row = $data['rapat']->getRowArray()) > 0) {
            download_files($row['files_upload5']);
        } else {
            return false;
        }
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

    public function get_cetaks()
    {
        $where = array(
            'from_date' => $this->request->getPost('from_date'),
            'to_date' => $this->request->getPost('to_date')
        );

        if ($this->form_validation->run($where, 'riwayat') == FALSE) {

            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());

            $data = [
                'page_title' => 'E-RAPAT - Cetak Per-date',
                'nav_title' => 'cetak',
                'tabs' => 'cetak',
                'cetak' => $this->rapatonoff
                    ->getWhere([
                        'user_id' => session()->get('id')
                    ])
                    ->getResultArray()
            ];

            return view('cpanel/cetak/view_cetak', $data);
        } else {
            $data = [
                'page_title' => 'E-RAPAT - Cetak Per-date',
                'nav_title' => 'cetak',
                'tabs' => 'cetak',
                'cetak' => $this->rapatonoff
                    ->getWhere([
                        'end_date' => $where['from_date'],
                        'end_date' => $where['to_date'],
                        'email' => session()->get('email')
                    ])->getResultArray(),
            ];

            return view('cpanel/cetak/view_cetak', $data);
        }
    }


    public function cetakperdate()
    {

        $html = view('cpanel/rapat/view_cetak_perdate', [
            'page_title' => 'E-RAPAT - Cetak Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' =>  $this->rapatonoff
                ->getWhere([
                    'user_id' => session()->get('id')
                ])
                ->getResultArray()
        ]);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetFont('helvetica', 8);
        $pdf->SetAuthor('Ivandi Djoh Gah');
        $pdf->SetTitle('E-RAPAT - Cetak Detail');
        $pdf->SetSubject('E-RAPAT - Cetak Detail');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('view_cetak_detail.pdf', 'I');
    }

    public function cetakdetail($code = '')
    {

        $html = view('cpanel/rapat/view_cetak_detail', [
            'page_title' => 'E-RAPAT - Cetak Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' => $this->rapatonoff
                ->getWhere(['unique_code' => $code])
                ->getRow()
        ]);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetFont('helvetica', 10);
        $pdf->SetAuthor('Ivandi Djoh Gah');
        $pdf->SetTitle('E-RAPAT - Cetak Detail');
        $pdf->SetSubject('E-RAPAT - Cetak Detail');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('view_cetak_detail.pdf', 'I');

        // return view('cpanel/rapat/view_cetak_detail', $data);
    }
}
