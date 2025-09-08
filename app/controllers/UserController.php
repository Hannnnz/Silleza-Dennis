<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
    }

    // READ - View all users
    public function view()
    {
        $data['users'] = $this->UserModel->all();
        $this->call->view('users/view', $data);
    }

    // CREATE - Show form and handle creation
    public function create()
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            try {
                // Treat any non-exception insert as success (insertId may be 0 depending on schema)
                $this->UserModel->insert($data);
                redirect('users/view');
            } catch (Exception $e) {
                echo 'Something went wrong while creating user: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // UPDATE - Show form and handle update
    public function update($id)
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            try {
                // Redirect even if affected rows is 0 (no changes) to avoid false negatives
                $this->UserModel->update($id, $data);
                redirect('users/view');
            } catch (Exception $e) {
                echo 'Something went wrong while updating user: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            $data['user'] = $this->UserModel->find($id);
            $this->call->view('users/update', $data);
        }
    }

    // DELETE - Handle deletion
    public function delete($id)
    {
        if ($this->UserModel->delete($id)) {
            redirect('users/view');
        } else {
            echo 'Something went wrong while deleting user';
        }
    }
}
