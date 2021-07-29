<?php

namespace App\Controllers;

use App\Models\EventModel;

class Darah extends BaseController
{
    protected $eventModel;
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_event') ?  $this->request->getVar('page_event') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $event = $this->eventModel->search($keyword);
        } else {
            $event = $this->eventModel;
        }

        $data = [
            'title' => 'Event | Donorin',
            // 'faq' => $this->faqModel->findAll()
            'event' => $event->paginate(5, 'event'),
            'pager' => $this->eventModel->pager,
            'currentPage' => $currentPage
        ];

        return view('darah/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Event',
            'validation' => \Config\Services::validation()
        ];

        return view('darah/create', $data);
        
    }

    public function save()
    {
        if (!$this->validate([
            'event' => [

                'rules' => 'required|is_unique[event.event]',
                'errors' => [
                    'required' => 'Event harus diisi.',
                    'is_unique' => 'Event sudah terdaftar',
                ]
                ],
            'desc' => [

                'rules' => 'required',
                'errors' => [
                'required' => 'Deskripsi harus diisi.',
                ]
                ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/darah/create')->withInput();
        }

        $slug = url_title($this->request->getVar('event'), '-', true);
        $this->eventModel->save([
            'event' => $this->request->getVar('event'),
            'slug' => $slug,
            'desc' => $this->request->getVar('desc'),
            'tanggal' => $this->request->getVar('tanggal')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/darah');

        // $this->request->getVar();
    }

    public function delete($id)
    {
        $this->eventModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/darah');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Event',
            'validation' => \Config\Services::validation(),
            'event' => $this->eventModel->getEv($slug)
        ];

        return view('darah/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $eventLama = $this->eventModel->getEv($this->request->getVar('slug'));
        if($eventLama['event'] == $this->request->getVar('event')) {
            $rule_event = 'required';
        } else {
            $rule_event = 'required|is_unique[event.event]';
        }

        if (!$this->validate([
            'event' => [

                'rules' => $rule_event,
                'errors' => [
                    'required' => 'Event harus diisi.',
                    'is_unique' => 'Event sudah terdaftar',
                ]
                ],
            'desc' => [

                'rules' => 'required',
                'errors' => [
                'required' => 'Deskripsi harus diisi.',
                ]
                ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/darah/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('event'), '-', true);
        $this->eventModel->save([
            'id' => $id,
            'event' => $this->request->getVar('event'),
            'slug' => $slug,
            'desc' => $this->request->getVar('desc'),
            'tanggal' => $this->request->getVar('tanggal')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/darah');

    }
}
