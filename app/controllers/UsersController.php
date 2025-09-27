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
        $per_page = 5;
        $page = max(1, (int)$page); // page mula sa URI segment

        $total = $this->UsersModel->count_all();

        $this->pagination->set_theme('tailwind');
        $pager = $this->pagination->initialize($total, $per_page, $page, 'users/index');

        $data['links'] = $this->pagination->paginate();
        $data['users'] = $this->UsersModel->get_paginated($pager['limit']);
        $data['pager_info'] = $pager['info'];

        $this->call->view('users/index', $data);
    }

    public function create() { /* same code as before */ }
    public function update($id) { /* same code as before */ }
    public function delete($id) { /* same code as before */ }
}
