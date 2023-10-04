<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(6)->create();

        Listing::factory(10)->create();
        // Listing::create([
        //     'title' => 'Senior Laravel Developer',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quasi quaerat error! Mollitia ex, ea quis est aperiam dicta distinctio a harum asperiores temporibus, consequuntur facere labore tempora fuga consequatur.',
        //     'tags' => 'laravel, javascript',
        // ]);
        // Listing::create([
        //     'title' => 'Junior Laravel Developer',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem quasi quaerat error! Mollitia ex, ea quis est aperiam dicta distinctio a potang, consequuntur facere ina tempora moka consequatur.',
        //     'tags' => 'laravel, java',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
