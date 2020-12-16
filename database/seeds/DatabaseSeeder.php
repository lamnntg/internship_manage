<?php

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
        $this->call(QuestionsSeeder::class);
        $this->call(QuestionCategorySeeder::class);
        $this->call(QuestionDegree::class);
        $this->call(CandidateSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
