<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new  \App\Models\User;
        $admin->username = 'admin';
        $admin->name = 'Raihan Muhammad';
        $admin->email = 'admin@larastore.test';
        $admin->roles = json_encode(['ADMIN']);
        $admin->password = \Hash::make('admin');
        $admin->avatar = 'avatar.png';
        $admin->address = 'Jl Seokarno';

        $admin->save();
        $this->command->info('User admin berhasil di insert!');
    }
}
