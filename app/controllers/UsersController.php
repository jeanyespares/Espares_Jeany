<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('pagination');
    }

    public function index($page = 1)
    {
        $per_page = 5; // ✅ 5 records per page
        $total = $this->UsersModel->count_all();

        // Initialize pagination (LavaLust built-in)
        $pager = $this->pagination->initialize($total, $per_page, $page, 'users/index');
        $data['links'] = $this->pagination->paginate();

        // ✅ extract limit & offset
        $limit = $per_page;
        $offset = ($page - 1) * $per_page;

        // Kunin records na may limit + offset
        $data['users'] = $this->UsersModel->get_paginated($limit, $offset);

        $this->call->view('users/index', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $data = [
                'fname' => $this->io->post('fname'),
                'lname' => $this->io->post('lname'),
                'email' => $this->io->post('email')
            ];

            if ($this->UsersModel->insert($data)) {
                // ✅ balik lagi sa page 1
                redirect(site_url('users/index/1'));
            } else {
                echo "Error in creating user.";
            }
        } else {
            $this->call->view('users/create');
        }
    }

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
                redirect(site_url('users/index/1'));
            } else {
                echo "Error in updating user.";
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect(site_url('users/index/1'));
        } else {
            echo "Error in deleting user.";
        }
    }
}
