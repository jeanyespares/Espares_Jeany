<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('pagination');
        $this->call->helper('url');
    }

    // 📋 List users with pagination + optional search
    public function index()
    {
        $page = $this->io->get('page') ? (int) $this->io->get('page') : 1;
        $q = $this->io->get('q') ? trim($this->io->get('q')) : '';
        $records_per_page = 5;

        $result = $this->UsersModel->page($q, $records_per_page, $page);
        $data['users'] = $result['records'];
        $total_rows = $result['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('default');
        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            base_url('index.php/users') . '?q=' . urlencode($q)
        );

        $data['links'] = $this->pagination->paginate();
        $this->call->view('users/index', $data);
    }

    // ➕ Show form to create user
    public function create()
    {
        $this->call->view('users/create');
    }

    // ✅ Handle form submission to store user
    public function store()
    {
        $data = [
            'fname' => $this->io->post('fname'),
            'lname' => $this->io->post('lname'),
            'email' => $this->io->post('email')
        ];

        if ($this->UsersModel->insert($data)) {
            redirect(base_url('index.php/users'));
        } else {
            echo '❌ Error inserting user.';
        }
    }

    // ✏️ Show form to update user
    public function edit($id)
    {
        $data['user'] = $this->UsersModel->find($id);
        $this->call->view('users/update', $data);
    }

    // ✅ Handle update submission
    public function update($id)
    {
        $payload = [
            'fname' => $this->io->post('fname'),
            'lname' => $this->io->post('lname'),
            'email' => $this->io->post('email')
        ];

        if ($this->UsersModel->update($id, $payload)) {
            redirect(base_url('index.php/users'));
        } else {
            echo '❌ Error updating user.';
        }
    }

    // 🗑 Delete user
    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect(base_url('index.php/users'));
        } else {
            echo '❌ Error deleting user.';
        }
    }
}