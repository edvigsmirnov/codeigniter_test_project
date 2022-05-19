<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $model = model(UsersModel::class);

        $data = [
            'fields' => $model->getColumnNames(),
            'users' => $model->getUsers(),
            'title' => 'Users List',
        ];

        echo view('templates/header', $data);
        echo view('users/list', $data);
        echo view('templates/footer', $data);
    }

    public function view($page)
    {
        if (!is_file(APPPATH . 'Views/users/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        if ($page === 'list') {
            return $this->index();
        }
        if ($page === 'delete') {
            echo view('templates/header');
            echo view('users/delete');
            echo view('templates/footer');
        }
        $data['title'] = ucfirst($page);

        echo view('templates/header', $data);
        echo view('users/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function save()
    {
        $model = model(UsersModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate(
                [
                    'firstName' => 'required|min_length[1]|max_length[255]',
                    'lastName' => 'required|min_length[1]|max_length[255]',
                    'email' => 'required|min_length[1]|max_length[255]',
                    'role' => 'required|min_length[1]|max_length[255]',
                ])) {
            $model->save([
                'id' => $this->request->getPost('id') ?? '',
                'first_name' => $this->request->getPost('firstName'),
                'last_name' => $this->request->getPost('lastName'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
                'date_created' => date('d.m.Y', strtotime('now'))
            ]);

            $data = [
                'title' => 'User was successfully created!',
            ];
            echo view('templates/header', $data);
            echo view('users/success', $data);
            echo view('templates/footer');
        } else {
            $data['title'] = 'Try again!';
            echo view('templates/header', $data);
            echo view('users/create');
            echo view('templates/footer');
        }
    }

    public function getUserPage($id)
    {
        $model = model(UsersModel::class);

        $data = [
            'title' => 'Edit user info',
            'user' => $model->getUser($id),
        ];

        echo view('templates/header', $data);
        echo view('users/edit', $data);
        echo view('templates/footer');
    }

    public function update()
    {
        $model = model(UsersModel::class);
        $userID = $this->request->getPost('id');
        $user = $model->getUser($userID);

        $data = [
            'id' => $userID,
            'first_name' => $this->request->getPost('firstName') ?: $user['first_name'],
            'last_name' => $this->request->getPost('lastName') ?: $user['last_name'],
            'email' => $this->request->getPost('email') ?: $user['email'],
            'role' => $this->request->getPost('role') ?: $user['role']
        ];

        $model->save($data);

        return $this->index();
    }

    public function delete()
    {
        $model = model(UsersModel::class);

        $model->delete([$this->request->getPost('id')]);

        return $this->index();
    }

    public function confirmDeletion($id = '')
    {
        $data = [
            'id' => $id,
            'title' => 'Delete user'
        ];

        echo view('/templates/header', $data);
        echo view('/users/delete', $data);
        echo view('/templates/footer');
    }
}
