<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'Carriage Doors',
            'Carriage Doors, Bifold',
            'Carriage Doors, Trifold',
            'Carriage Doors, 4-Fold',
            'Carriage Doors, 5-Fold',
            'Carriage Doors, 6-Fold',
            'Carriage Doors, Double Hung',
            'Driveway Gates',
            'Entry Gates',
            'Entry Gates, Center Pivot',
            'Entry Doors',
            'Garage Doors',
            'Garage Doors, Modern',
            'Garage Doors, Mediterranean',
            'Garage Doors, Traditional',
            'Pedestrian Gates',
            'Shutters',
            'Shutters, Non-Operable'
        ];

        foreach ($products as $product) {
            \App\Models\Product::create(['name' => $product]);
        }
    }
}
