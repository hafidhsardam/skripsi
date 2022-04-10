<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Input admin to users table
        DB::table('users')->insert([
            'name'           => 'Admin 1',
            'email'          => 'admin_1@gmail.com',
            'phone'          => '09123124123',
            'role'           => 'admin',
            'password'       => 'admin_12345',
            'remember_token' => Str::random(10),
            'created_at'     => date("Y-m-d H:i:s"),
            'updated_at'     => date("Y-m-d H:i:s")
        ]);

        // Input users to users table
        DB::table('users')->insert([
            'name'           => 'User 1',
            'email'          => 'user_1@gmail.com',
            'phone'          => '08123124123',
            'role'           => 'user',
            'password'       => 'user_12345',
            'remember_token' => Str::random(10),
            'created_at'     => date("Y-m-d H:i:s"),
            'updated_at'     => date("Y-m-d H:i:s")
        ]);

        // Input category 1 to categories table
        DB::table('categories')->insert([
            'name'       => 'Pantai',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // Input category 2 to categories table
        DB::table('categories')->insert([
            'name'       => 'Gunung',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // Input Articles 1 Category Pantai to Articles Table
        DB::table('articles')->insert([
            'user_id'     => '1',
            'categorie_id' => '1',
            'title'       => 'Pantai Balekambang, Jawa Timur',
            'description' => 'Pantai Balekambang adalah sebuah pantai di pesisir selatan yang terletak di tepi Samudra Indonesia secara administratif masuk wilayah Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Kabupaten Malang, Jawa Timur dan merupakan salah satu wisata di Kabupaten Malang sejak 1985 hingga kini.',
            'image'       => 'pantai_balekambang.jpg',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s")
        ]);

        // Input Articles 2 Category Gunung to Articles Table
        DB::table('articles')->insert([
            'user_id'     => '1',
            'categorie_id' => '2',
            'title'       => 'Gunung Bromo, Jawa Timur',
            'description' => 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.',
            'image'       => 'gunung_bromo.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
