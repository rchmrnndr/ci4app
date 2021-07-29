<?php

namespace App\Controllers;

use App\Models\FaqModel;

class FAQ extends BaseController
{
    protected $faqModel;
    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_faq') ?  $this->request->getVar('page_faq') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $faq = $this->faqModel->search($keyword);
        } else {
            $faq = $this->faqModel;
        }

        $data = [
            'title' => 'FAQ | Donorin',
            // 'faq' => $this->faqModel->findAll()
            'faq' => $faq->paginate(5, 'faq'),
            'pager' => $this->faqModel->pager,
            'currentPage' => $currentPage
        ];

        return view('faq/index', $data);
    }

    public function delete($id)
    {
        $this->faqModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/faq');
    }
}
