<?php

use App\Dish;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all()->pluck('id');
        for ($i=0;$i < 50; $i++) {
            $name = $faker->words(5, true);

            $dish = Dish::create([
                'name' => $name,
                'price' => $faker->numberBetween(100,5000),
                'image' => 'https://picsum.photos/id/'. rand(0, 1000) .'/500/400',
                'visibility' => $faker->numberBetween(0,1),
                'description' => $faker->paragraph(3, true),
                'slug' => User::getSlug($name),
                'user_id' => $faker->randomElement($users),
            ]);
        };
    }
}
