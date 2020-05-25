<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $user          =  \App\User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->restaurants()->create([
            'name'     => 'nha hang thuy san cho meo',
            'location' => 'Ha Nam viet nam',
        ]);
        $user->restaurants()->create([
            'name'     => 'nha hang de ga nui doi',
            'location' => 'Ha Tinh viet nam',
        ]);
        $user->restaurants()->create([
            'name'     => 'Pho hN',
            'location' => 'Ha noi viet nam',
        ]);
    }
}
