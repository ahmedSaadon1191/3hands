<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
                'name'      => 'ahmed ',
                'email'     => 'ahmed@gmail.com',
                'password'  => bcrypt('ahmed1191'),
                'logo'      => 'person-icon.png' 
            ]);
    }
}
