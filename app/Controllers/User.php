<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
	public function index($id)
	{
        $db = new userModel();
        $user = $db->getUser($id);

        $header_data = [
            'page_title' => $user['user_name'],
        ];
        $main_data = [
            'user' => [
                'name'  => $user['user_name'],
                'email' => $user['user_mail'],
            ],
        ];
        echo view('/templates/header', $header_data);
        echo view('account', $main_data);
        echo view('/templates/footer');
	}

	public function register()
    {
        $db = new UserModel();
        $session = session();
        $myRequest = $this->request->getVar();
        $previous_url = $session->get('_ci_previous_url');

        $user_id = $db->registerUser($myRequest);
        $session->set(['user_id' => $user_id]);

        return redirect()->to($previous_url);
    }

    public function login()
    {
        $session = session();
        $db = new UserModel();
        $myRequest = $this->request->getVar();
        $previous_url = $session->get('_ci_previous_url');

        $user_id = $db->loginUser($myRequest);
        $session->set(['user_id' => $user_id]);

        return redirect()->to($previous_url);
    }

    public function logout()
    {
        $session = session();
        $previous_url = $session->get('_ci_previous_url');

        $session->destroy();

        return redirect()->to($previous_url);
    }

    /*
     *
     */
    public function changeUserData()
    {
        $db = new UserModel();
        $session = session();
        $myRequest = $this->request->getVar();
        $previous_url = $session->get('_ci_previous_url');

        $user_id = $session->get('user_id');
        $db->changeUserData($user_id, $myRequest);

        return redirect()->to($previous_url);
    }
}
