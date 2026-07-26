<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo tài khoản admin mặc định
        User::updateOrCreate(
            ['email' => 'admin@tienganh.vn'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@tienganh.vn',
                'password' => Hash::make('Admin@123'),
                'role'     => 'admin',
                'level'    => 'C2',
                'xp'       => 9999,
            ]
        );

        $this->command->info('Admin account created:');
        $this->command->line('  Email   : admin@tienganh.vn');
        $this->command->line('  Password: Admin@123');
        $this->command->warn('  Doi mat khau ngay sau khi dang nhap!');
    }
}
