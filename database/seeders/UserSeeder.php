<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'ahmed ',
                'email' => 'ahmed@gmail.com',
                'password' => bcrypt('ahmed1191'),
                'logo'      => 'person-icon.png' 
            ]);
    }
}
