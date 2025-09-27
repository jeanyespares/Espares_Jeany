<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
    }

    // Show all users without pagination
    public function index()
    {
        $data['users'] = $this->UsersModel->all();
        $this->call->view('users/index', $data);
    }

    public function create()
    {
        if ($this->io->method() === 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->insert($data)) {
                redirect(site_url());
            } else {
                show_error("Error creating user.");
            }
        } else {
            $this->call->view('users/create');
        }
    }

    public function update($id)
    {
        $user = $this->UsersModel->find($id);
        if (!$user) {
            show_error("User not found.");
            return;
        }

        if ($this->io->method() === 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->update($id, $data)) {
                redirect(site_url());
            } else {
                show_error("Error updating user.");
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect(site_url());
        } else {
            show_error("Error deleting user.");
        }
    }
}
