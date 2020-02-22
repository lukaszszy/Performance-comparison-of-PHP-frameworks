<?php

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteTableSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 1000; $i++){
            $user_data[] = [
            'title' => Str::random(50),
            'body' => Str::random(450),
            'user_id' => 1,
            ];
       }

       Note::insert($user_data);
    }
}
