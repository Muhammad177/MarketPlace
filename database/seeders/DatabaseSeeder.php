<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::create([
            
        // //     'name' => 'wahyu',
        // //     'username' => 'wahyu123',
        // //     'email' => 'wahyu123@gmail.com',
        // //     'password' => bcrypt('123123')
            
        // // ]);
        // User::factory(3)->create();

        // // Post::create([
        // //     'title' => 'wahyu',
        // //     'slug' => 'wahyu',
        // //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit officiis fuga unde nesciunt cum, nihil temporibus autem eos magni tempora, eum et. Voluptatibus molestias ut eum, similique tempore ad praesentium, quam aliquid natus ratione veniam modi possimus enim atque iste, corporis blanditiis sed ducimus. Ipsum nobis pariatur itaque nulla inventore est, totam optio vitae architecto cupiditate sit aperiam blanditiis similique, error perferendis molestias magni adipisci distinctio tempore maxime. Veniam ea laboriosam eveniet porro, perspiciatis rerum sequi repellat officia quidem quas laborum accusantium delectus alias deserunt debitis soluta inventore ducimus quos cupiditate fuga nemo. Quis in rerum laboriosam fugiat amet error.',
        // //     'category_id' => 1,
        // //     'user_id' => 1
        // // ]);
        // // Post::create([
        // //     'title' => 'ahmad',
        // //     'slug' => 'ahmad',
        // //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit officiis fuga unde nesciunt cum, nihil temporibus autem eos magni tempora, eum et. Voluptatibus molestias ut eum, similique tempore ad praesentium, quam aliquid natus ratione veniam modi possimus enim atque iste, corporis blanditiis sed ducimus. Ipsum nobis pariatur itaque nulla inventore est, totam optio vitae architecto cupiditate sit aperiam blanditiis similique, error perferendis molestias magni adipisci distinctio tempore maxime. Veniam ea laboriosam eveniet porro, perspiciatis rerum sequi repellat officia quidem quas laborum accusantium delectus alias deserunt debitis soluta inventore ducimus quos cupiditate fuga nemo. Quis in rerum laboriosam fugiat amet error.',
        // //     'category_id' => 1,
        // //     'user_id' => 1
        // // ]);

// Category::create([
//     'name' => 'Elektronik',
//     'slug' => 'elektronik'
// ]);

// Category::create([
//     'name' => 'Kecantikan',
//     'slug' => 'kecantikan'
// ]);

// Category::create([
//     'name' => 'Fashion',
//     'slug' => 'fashion'
// ]);

// Category::create([
//     'name' => 'Peralatan Rumah Tangga',
//     'slug' => 'peralatan-rumah-tangga'
// ]);

        Post::factory(3)->create();
        Shop::factory(3)->create();
    }
}
