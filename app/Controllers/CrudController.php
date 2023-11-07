<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class CrudController extends BaseController
{
    public function index()
    {
        $model1 = new CrudModel();
        $data['test'] = $model1->findAll();
    //   $data=[];
    //     $data = [
    //         'name' => 'Daftar Pengguna',
    //         'email' => 'sdfsdfsdfsdf'
    //     ];
        return view('crudviews/crud',$data);
    }
    public function add()
    {
        //$model1 = new CrudModel();
        //$data['test'] = $model1->findAll();
    
        return view('crudviews/add');
    }
   // insert/create data
   public function create() {
    $model = new CrudModel();
   
    helper(['form']);
    $rules =[
        'name' => [
            'rules' =>'required|is_unique[crud.name]',
            'errors' =>[
                'required'=>'Name should be provided',
                'is_unique'=>'This name has already been taken, choose another one.'
            ]


            ],
        'description' => 'required|min_length[10]',
        'contact_email' => [
                            'rules' => 'required|valid_email|max_length[254]',
                            'errors' => [
                                            'required' => 'Please enter a email address.',
                                            'valid_email' => 'Please enter a valid email address.',
                                            'max_length' => 'Email too long!'
                                        ]
                            ],
        'contact_phone' => 'required|numeric|max_length[10]',
    ];

   

    if($this->validate($rules)){


    $data = [
        'name' => $this->request->getVar('name'),
        'description'  => $this->request->getVar('description'),
        'contact_phone'  => $this->request->getVar('contact_phone'),
        'contact_email'  => $this->request->getVar('contact_email')
    ];
    $added = $model->insert($data);
        if($added){
            $session = session();
            $session->setFlashdata('created', 'Successfully added');
        }
        return $this->response->redirect(site_url('/crud'));
    }
    else
    {
        $data['validation'] = $this->validator;
        echo view('crudviews/add', $data);
    } 


}//method ends

    // update user data
    public function edit($id = null){
        $model = new CrudModel();
        //$id = $this->request->getVar('id'); if the input field passed with hidden
        $data1 = [
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'contact_phone'  => $this->request->getVar('phone'),
            'contact_email'  => $this->request->getVar('email')
        ];
        
        $edited = $model->update($id, $data1);
        if($edited){
            $session = session();
            //$session['edited']= 'Successfully Updated';
            $session->setTempdata('edited','Successfully Updated', 10);
        }
        return $this->response->redirect(site_url('/crud'));
    }
        // show single user
    public function singleUserview($id = null){
            $model = new CrudModel();
            $data['single_data'] = $model->where('id', $id)->first();
            return view('crudviews/edit', $data);
    }


    // delete user data
    public function delete($id = null){
        $model = new CrudModel();
        $model->delete($id);
        $session = session();
        $session->setFlashdata('deleted', 'Successfully deleted');

        return $this->response->redirect(site_url('/crud'));
    }


    
}
