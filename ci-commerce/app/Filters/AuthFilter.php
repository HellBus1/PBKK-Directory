<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface {
  public function before(RequestInterface $request, $arguments = null)
  {
    if(!((session('usr_role') == 'admin') && (session('logged_in')))) {
      return redirect()->to('/admin');
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {

  }
}