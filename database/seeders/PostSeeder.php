<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Postların sahibi olacak bir kullanıcı bul ya da oluştur
        $user = User::first() ?? User::factory()->create();

        $titles = [
            'Laravel ile İlk Adımlarım',
            'Eloquent İlişkileri Nasıl Çalışır',
            'Blade Component Sistemi Üzerine',
        ];

        foreach ($titles as $title) {
            Post::create([
                'user_id' => $user->id, // mass assignment değil, seeder'da doğrudan atama serbest
                'title' => $title,
                'slug' => Str::slug($title), // "Laravel ile İlk Adımlarım" -> "laravel-ile-ilk-adimlarim"
                'body' => fake()->paragraphs(3, true), // 3 paragraf sahte metin
                'published_at' => now(),
            ]);
        }
    }
}