<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('pagination');
    }

    // Display all users with pagination
    public function index($page = 1)
    {
        $per_page = 5;
        $total = $this->UsersModel->count_all();

        // Use Tailwind pagination
        $this->pagination->set_theme('tailwind');

        // Initialize pagination
        $pager = $this->pagination->initialize($total, $per_page, $page, 'users/index');
        $data['links'] = $this->pagination->paginate();

        // Get LIMIT clause from pager
        $limit_clause = $pager['limit'];

        // Fetch paginated users
        $data['users'] = $this->UsersModel->get_paginated($limit_clause);

        // Load view
        $this->call->view('users/index', $data);
    }

    // Create new user
    public function create()
    {
        if ($this->io->method() == 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->insert($data)) {
                redirect(site_url());
            } else {
                echo "Error in creating user.";
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // Update existing user
    public function update($id)
    {
        $user = $this->UsersModel->find($id);
        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($this->io->method() == 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->update($id, $data)) {
                redirect(site_url());
            } else {
                echo "Error in updating user.";
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    // Delete user
    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect(site_url());
        } else {
            echo "Error in deleting user.";
        }
    }
}
