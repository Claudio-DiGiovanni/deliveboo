<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = [
            [
                'name'       =>  'McDonald',
                'email'      =>  'mcdonald@libero.it',
                'password'   =>   Hash::make('mcdonald'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('McDonald'),
                'image_logo' =>   'https://picsum.photos/id/'. rand(0, 1000) .'/500/400',
            ],
            [
                'name'       =>  'BurgerKing',
                'email'      =>  'burgerking@libero.it',
                'password'   =>   Hash::make('BurgerKing'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('BurgerKing'),
                'image_logo' =>   'https://picsum.photos/id/'. rand(0, 1000) .'/500/400',
            ],
            [
                'name'       =>  'Kfc',
                'email'      =>  'kfc@libero.it',
                'password'   =>   Hash::make('Kfc'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('Kfc'),
                'image_logo' =>   'https://picsum.photos/id/'. rand(0, 1000) .'/500/400',
            ],
        ];

        foreach ($restaurants as $restaurant) {

            $objUser = new User;
            $objUser->name        = $restaurant['name'];
            $objUser->email       = $restaurant['email'];
            $objUser->password    = $restaurant['password'];
            $objUser->address     = $restaurant['address'];
            $objUser->PIVA        = $restaurant['PIVA'];
            $objUser->slug        = $restaurant['slug'];
            $objUser->image_logo  = $restaurant['image_logo'];
            $objUser->save();
        }
    }
}
