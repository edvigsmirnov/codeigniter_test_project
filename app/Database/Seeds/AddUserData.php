<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddUserData extends Seeder
{
    public function run()
    {
        $data = [
            [
                'first_name' => 'Michael',
                'last_name' => 'Scott',
                'email' => 'bigboss@gmail.com',
                'role' => 'admin',
                'date_created' => date('d.m.Y', strtotime('now'))
            ],
            [
                'first_name' => 'Jack',
                'last_name' => 'London',
                'email' => 'wolfboy@gmail.com',
                'role' => 'user',
                'date_created' => date('d.m.Y', strtotime('now'))
            ],
            [
                'first_name' => 'Peter',
                'last_name' => 'Parker',
                'email' => 'webhead@gmail.com',
                'role' => 'user',
                'date_created' => date('d.m.Y', strtotime('now'))
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
