<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() {
        $session = \Config\Services::session();
        if (isset($session->userInfo)) {
            if ($session->userInfo['credential'] == true) {
                $data['userInfo'] = $session->userInfo;
                return view('home', $data);
            } else {
                return redirect()->to('/auth');
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    public function auth() {
        return view('auth');
    }
}
