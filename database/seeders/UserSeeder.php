<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Rifky',
            'email' => 'rifky@gmail.com',
            'password' => bcrypt('admin111')
        ]);
        $user1->assignRole('Bidang Infrastruktur dan Kewilayahan');

        $user2 = User::create([
            'name' => 'Piqri',
            'email' => 'piqri@gmail.com',
            'password' => bcrypt('admin222')
        ]);
        $user2->assignRole('Bidang Ekonomi');

        $user3 = User::create([
            'name' => 'Edwan',
            'email' => 'edwan@gmail.com',
            'password' => bcrypt('admin333')
        ]);
        $user3->assignRole('Bidang Geospasial');
        
        $user4 = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user4->assignRole('Admin');
    }
}
