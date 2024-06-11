<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'jenis' => 'Corporate',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, officia nihil maiores totam quia laborum beatae cum reiciendis ut',
            'gambar' => 'corporate.jpg',
        ]);

        Product::create([
            'jenis' => 'Wedding',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, officia nihil maiores totam quia laborum beatae cum reiciendis ut',
            'gambar' => 'wedding.png',
        ]);

        Product::create([
            'jenis' => 'Event',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, officia nihil maiores totam quia laborum beatae cum reiciendis ut',
            'gambar' => 'event.jpg',
        ]);
    }
}
