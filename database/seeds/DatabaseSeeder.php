<?php

use Database\Seeders\ArticlesSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\PhotoAlbumSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\SlidersSeeder;
use Database\Seeders\TestimonialsSeeder;
use Database\Seeders\VideosSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            CountrySeeder::class,
            SettingsSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            FaqSeeder::class,
            VideosSeeder::class,
            PhotoAlbumSeeder::class,
            SlidersSeeder::class,
            // MyNewsSeeder::class,
            TestimonialsSeeder::class,
            ServicesSeeder::class,
            ArticlesSeeder::class,

        ]);
    }
}
