<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use App\Models\Note;
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
        User::factory()->create([
            'email' => 'i@admin.com',
            'password' => bcrypt('123456')
        ]);

        Note::factory(30)->create();


        Event::create([
            'slug' => 'fedpatmex',
            'name' => 'fedpatmex',
            'description' =>'This is an event'

        ]);

    }
}
