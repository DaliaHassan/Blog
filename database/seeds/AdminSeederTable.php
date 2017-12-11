<?php

use Illuminate\Database\Seeder;
use App\User;


class AdminSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name'  		=> 'admin',
            'email'			=> 'admin@gmail.com',
            'password'		=> bcrypt('secret')
        ]);
    }
}
