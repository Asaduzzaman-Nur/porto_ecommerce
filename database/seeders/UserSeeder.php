<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
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
        $this->defaultUser();
        $faker = Factory::create();
        foreach (range(1,10) as $index) {
            User::create([
                'name'      =>   $faker->name,
                'email'     =>      $faker->unique()->email,
                'password'  =>       bcrypt('123456')
            ]);
        }



    }
    public function defaultUser(){
        User::create([
            'name'      =>      'Asaduzzaman Nur',
            'email'     =>      'admin@gmail.com',
            'password'  =>       bcrypt('123456')
        ]);
    }
}
