<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        }
    }
}
