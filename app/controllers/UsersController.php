<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
    }

    // Show all users
    public function index()
    {
        $data['users'] = $this->UsersModel->all();   // uses model::all($with_deleted = false)
        $this->call->view('users/index', $data);
    }

    // Create new user
    public function create()
    {
        if ($this->io->method() === 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->insert($data)) {
                redirect(site_url('users'));
            } else {
                show_error("Error creating user.");
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // Update user
    public function update($id = null)
    {
        if ($id === null) show_404();

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
                redirect(site_url('users'));
            } else {
                show_error("Error updating user.");
            }
        } else {
            $this->call->view('users/update', ['user' => $user]);
        }
    }

    // Delete user
    public function delete($id = null)
    {
        if ($id === null) show_404();

        if ($this->UsersModel->delete($id)) {
            redirect(site_url('users'));
        } else {
            show_error("Error deleting user.");
        }
    }
}
