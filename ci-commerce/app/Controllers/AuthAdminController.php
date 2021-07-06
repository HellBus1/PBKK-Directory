<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthAdminController extends BaseController
{
  public function index(){
    helper(['form']);
    return view('admin/pages/login');    
  }

  public function login(){
    $session = session();
    $model = new User();

    $email = $this->request->getVar('usr_email');
    $password = $this->request->getVar('usr_password');

    $data = $model->where('usr_email', $email)->first();
    if($data){
        $pass = $data['usr_password'];
        $verify_pass = password_verify($password, $pass);
        if($verify_pass){
            $ses_data = [
                'id'  => $data['id'],
                'usr_name'  => $data['usr_name'],
                'usr_email' => $data['usr_email'],
                'logged_in' => TRUE,
                'usr_role'  => $data['usr_role'],
            ];
            $session->set($ses_data);
            return redirect()->to('/admin');
        }else{
            $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->to('/admin');
        }
    }else{
        $session->setFlashdata('msg', 'Email not Found');
        return redirect()->to('/admin');
    }
  }

  public function logout(){
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }
}
