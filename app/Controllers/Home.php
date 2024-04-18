<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Home extends BaseController
{

    public function index()
    {
        return view("login/login");
    }
    public function authenticate()
    {
        $username = $this->request->getVar("username");
        $password = md5($this->request->getVar("password"));

        $userModel = new ModelUser();
        $user = $userModel->where("username", $username)->first();

        if ($user) {
            if ($user["password"] == $password) {
                session()->set("isLogin", true);
                session()->set("username", $user["username"]);
                return redirect()->to("/mahasiswa");
            } else {
                return redirect()->to(base_url("./mahasiswa"))->with("error", "Password salah");
            }
        } else {
            return redirect()->to("/")->with("error", "Username tidak ditemukan");
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to("/");
    }
}
