<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('pagination');
    }

    // Display users with pagination
    public function index($page = 1)
    {
        $per_page = 5;

        // ✅ Detect page number (segment OR query string)
        $get_page = (int) $this->io->get('page');   // for query string e.g. ?page=2
        if ($get_page > 0) {
            $page = $get_page;
        }

        $page = max(1, (int)$page);

        // Total records
        $total = $this->UsersModel->count_all();

        // Setup pagination
        $this->pagination->set_theme('tailwind');
        $pager = $this->pagination->initialize($total, $per_page, $page, 'users/index');

        // Fetch data
        $data['users'] = $this->UsersModel->get_paginated($pager['limit']);
        $data['links'] = $this->pagination->paginate();
        $data['pager_info'] = $pager['info'];

        // Load view
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
                redirect(site_url('users/index'));
            } else {
                show_error("Error creating user.");
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // Update user
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
                redirect(site_url('users/index'));
            } else {
                show_error("Error updating user.");
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
            redirect(site_url('users/index'));
        } else {
            show_error("Error deleting user.");
        }
    }
}
