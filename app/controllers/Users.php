<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate data
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                //Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken!';
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be atleast 6 characters';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['confirm_password'] !== $data['password']) {
                    $data['confirm_password_err'] = 'Password do not match!';
                }
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['name_err'])) {

                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_success', 'Your are registered and can log in.');
                    redirect('users/login');
                } else {
                    die('something went wrong');
                }
            } else {
                //Load view with errors
                $this->view('/users/register', $data);
            }
        } else {
            //Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            //Check for user/emai
            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'No user found!';
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                //Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                   //Create user session
                   $this->userModel->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    
                    $this->view('users/login', $data);
                }
            } else {
                //Load view with errors
                $this->view('/users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }
}
