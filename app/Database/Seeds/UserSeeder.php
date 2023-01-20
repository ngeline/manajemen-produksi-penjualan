<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_user' => 'Admin',
                'email_user' => 'admin@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ],
            [
                'name_user' => 'Owner',
                'email_user' => 'owner@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
