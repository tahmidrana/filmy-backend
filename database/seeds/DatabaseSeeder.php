<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // Example user
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        DB::table('genres')->insert([
            ['title' => 'Action'],
            ['title' => 'Horror'],
            ['title' => 'Thriller'],
            ['title' => 'Comedy'],
            ['title' => 'Science Fiction'],
            ['title' => 'Romance']
        ]);

        factory(App\Models\User::class, 5)->create();

        $genres = Genre::all();
        factory(App\Models\Film::class, 6)->create()->each(function ($film) use ($genres) {
            $film->comments()->save(factory(App\Models\Comment::class)->make());
            $film->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
