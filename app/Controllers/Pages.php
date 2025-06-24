<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\ContactModel;

class Pages extends BaseController
{
    protected $pageModel;
    protected $contactModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->contactModel = new ContactModel();
    }

    public function index($slug = 'home')
    {
        $data['page'] = $this->pageModel->getPageBySlug($slug);
        
        if (empty($data['page'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the page: ' . $slug);
        }
        
        return view('templates/header', $data)
            . view('pages/page', $data)
            . view('templates/footer');
    }

    public function contact()
    {
        helper(['form']);
        $data['page'] = $this->pageModel->getPageBySlug('contact');
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email|max_length[255]',
                'message' => 'required|min_length[10]'
            ];
            
            if ($this->validate($rules)) {
                $this->contactModel->save([
                    'name' => esc($this->request->getPost('name')),
                    'email' => esc($this->request->getPost('email')),
                    'message' => esc($this->request->getPost('message'))
                ]);
                
                return redirect()->to('/contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('templates/header', $data)
            . view('pages/contact', $data)
            . view('templates/footer');
    }
}