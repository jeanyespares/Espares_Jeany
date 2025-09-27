<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 * 
 * Automatically generated via CLI.
 */
class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->call->model('UsersModel');
        $data['users'] = $this->UsersModel->all();

        $this->call->view('users/index', $data);
    }

    function create()
    {
         
        if($this->io->method() == 'post'){
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = array(
                'username'=> $username,
                'email'=> $email
            );

            if($this->UsersModel->insert($data))
                {
                   redirect();
                }else{
                    echo "Error creating user.";
                    
                }
        }else{
            $this->call->view('users/create');
        }
       
    }

    function update($id){
    $user = $this->UsersModel->find($id);
    if(!$user){
        echo "User not found.";
        return;
    }

    if($this->io->method() == 'post'){
        $username = $this->io->post('username');
        $email = $this->io->post('email');

        $data = array(
            'username'=> $username,
            'email'=> $email
        );

        if($this->UsersModel->update($id, $data)){
            redirect(); 
        } else{
            echo "Error updating user.";
        }
    } else{
        $data['user'] = $user;
        $this->call->view('users/update', $data);
    }
}
    function delete($id){
       if($this->UsersModel->delete($id)) {
            redirect();
    } else{
        echo "Error deleting user.";
    }
}
}