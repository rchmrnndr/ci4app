<?php

namespace App\Controllers;

use App\Models\Stok_darahModel;

class Stok extends BaseController
{
    protected $stok_darahModel;
    public function __construct()
    {
        $this->stok_darahModel = new stok_darahModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_stok') ?  $this->request->getVar('page_stok') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $stok_darah = $this->stok_darahModel->search($keyword);
        } else {
            $stok_darah = $this->stok_darahModel;
        }

        $data = [
            'title' => 'Stok Darah | Donorin',
            // 'faq' => $this->faqModel->findAll()
            'stok_darah' => $stok_darah->paginate(5, 'stok_darah'),
            'pager' => $this->stok_darahModel->pager,
            'currentPage' => $currentPage
        ];

        return view('stok/index', $data);
    }

    // public function delete($id)
    // {
    //     $this->stok_darahModel->delete($id);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    //     return redirect()->to('/stok');
    // }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Stok Darah',
            'validation' => \Config\Services::validation(),
            'stok_darah' => $this->stok_darahModel->getStok($slug)
        ];

        return view('stok/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        // $stokLama = $this->stok_darahModel->getStok($this->request->getVar('slug'));
        // if($stoktLama['gol_dar'] == $this->request->getVar('event')) {
        //     $rule_event = 'required';
        // } else {
        //     $rule_event = 'required|is_unique[event.event]';
        // }

        // if (!$this->validate([
        //     'event' => [

        //         'rules' => $rule_event,
        //         'errors' => [
        //             'required' => 'Event harus diisi.',
        //             'is_unique' => 'Event sudah terdaftar',
        //         ]
        //         ],
        //     'desc' => [

        //         'rules' => 'required',
        //         'errors' => [
        //         'required' => 'Deskripsi harus diisi.',
        //         ]
        //         ]
        // ])) {
        //     // $validation = \Config\Services::validation();
        //     return redirect()->to('/darah/edit/' . $this->request->getVar('slug'))->withInput();
        // }

        // $slug = url_title($this->request->getVar('stok_darah'), '-', true);
        $this->stok_darahModel->save([
            'id' => $id,
            'gol_dar' => $this->request->getVar('gol_dar'),
            'slug' => $this->request->getVar('slug'),
            'rhesus_pos' => $this->request->getVar('rhesus_pos'),
            'rhesus_neg' => $this->request->getVar('rhesus_neg')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/stok');

    }
}
