<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedFakeBlogPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'First Blog Post',
                'body' => 'This is the body of the first blog post.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Blog Post',
                'body' => 'This is the body of the second blog post.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
