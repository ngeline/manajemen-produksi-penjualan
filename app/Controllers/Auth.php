<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['email_user' => $post['email']]);
        $user = $query->getRow();

        if ($user) {
            if (password_verify($post['password'], $user->password_user)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);
                return redirect()->to('admin');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }
}
