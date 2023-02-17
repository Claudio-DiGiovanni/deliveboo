<?php

use App\Type;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = User::all()->pluck('id');
        $types = [
            'pizzeria',
            'sushi',
            'trattoria',
            'fast food',
            'cinese',
            'street food',
            'vegano',
            'vegetariano',
        ];

        foreach ($types as $type) {
            $objType = new Type;
            $objType->name = $type;
            $objType->save();

            $objType->users()->attach($faker->randomElements($restaurants, rand(1, (count($restaurants) > 5) ? 5 : count($restaurants))));
        }
    }
}
