<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ((range(1, 50)) as $index) {
            $year = rand(2015, 2019);
            $month = rand(1, 12);
            $day = rand(1, 28);

            DB::table('posts')->insert([
                'title' => str_random(10),
                'user_id' => 1,
                'content' => str_random(100),
                'date' => $year . "-" . $month . "-" . $day,
                'image' => "img/posts/placeholder.jpg",
            ]);
        }
    }
}
