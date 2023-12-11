<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Faseena',
            'email' => 'faseena@example.com',
            'password' => bcrypt('123456'),
            'is_admin' => true
        ]);
    }
}
