<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::firstOrCreate(array(
            'name' => 'Береза повислая',
            'category_id' => 2,
        ), array(
            'name' => 'Береза повислая',
            'category_id' => 2,
            'price' => '354.45',
            'in_stock' => false,
            'rating' => '4.9',
        ));

        Product::firstOrCreate(array(
            'name' => 'Розмарин лекарственный',
            'category_id' => 3,
        ), array(
            'name' => 'Розмарин лекарственный',
            'category_id' => 3,
            'price' => '117.52',
            'in_stock' => true,
            'rating' => '1.5',
        ));

        Product::firstOrCreate(array(
            'name' => 'Клен остролистный',
            'category_id' => 2,
        ), array(
            'name' => 'Клен остролистный',
            'category_id' => 2,
            'price' => '104.42',
            'in_stock' => false,
            'rating' => '1.3',
        ));

        Product::firstOrCreate(array(
            'name' => 'Яблоня домашняя',
            'category_id' => 2,
        ), array(
            'name' => 'Яблоня домашняя',
            'category_id' => 2,
            'price' => '232.20',
            'in_stock' => false,
            'rating' => '2.3',
        ));

        Product::firstOrCreate(array(
            'name' => 'Дуб черешчатый',
            'category_id' => 2,
        ), array(
            'name' => 'Дуб черешчатый',
            'category_id' => 2,
            'price' => '473.53',
            'in_stock' => true,
            'rating' => '1.7',
        ));

        Product::firstOrCreate(array(
            'name' => 'Лиственница',
            'category_id' => 1,
        ), array(
            'name' => 'Лиственница',
            'category_id' => 1,
            'price' => '245.77',
            'in_stock' => true,
            'rating' => '0.2',
        ));

        Product::firstOrCreate(array(
            'name' => 'Лавр благородный',
            'category_id' => 3,
        ), array(
            'name' => 'Лавр благородный',
            'category_id' => 3,
            'price' => '316.49',
            'in_stock' => false,
            'rating' => '3.8',
        ));

        Product::firstOrCreate(array(
            'name' => 'Самшит вечнозеленый',
            'category_id' => 3,
        ), array(
            'name' => 'Самшит вечнозеленый',
            'category_id' => 3,
            'price' => '131.93',
            'in_stock' => true,
            'rating' => '0.2',
        ));

        Product::firstOrCreate(array(
            'name' => 'Можжевельник',
            'category_id' => 1,
        ), array(
            'name' => 'Можжевельник',
            'category_id' => 1,
            'price' => '49.65',
            'in_stock' => false,
            'rating' => '3.7',
        ));

        Product::firstOrCreate(array(
            'name' => 'Магония падуболистная',
            'category_id' => 3,
        ), array(
            'name' => 'Магония падуболистная',
            'category_id' => 3,
            'price' => '306.13',
            'in_stock' => false,
            'rating' => '3.7',
        ));

        Product::firstOrCreate(array(
            'name' => 'Липа мелколистная',
            'category_id' => 2,
        ), array(
            'name' => 'Липа мелколистная',
            'category_id' => 2,
            'price' => '281.94',
            'in_stock' => false,
            'rating' => '1.1',
        ));

        Product::firstOrCreate(array(
            'name' => 'Сосна обыкновенная',
            'category_id' => 1,
        ), array(
            'name' => 'Сосна обыкновенная',
            'category_id' => 1,
            'price' => '337.14',
            'in_stock' => false,
            'rating' => '4.8',
        ));

        Product::firstOrCreate(array(
            'name' => 'Пихта сибирская',
            'category_id' => 1,
        ), array(
            'name' => 'Пихта сибирская',
            'category_id' => 1,
            'price' => '370.65',
            'in_stock' => false,
            'rating' => '3.4',
        ));
    }
}
