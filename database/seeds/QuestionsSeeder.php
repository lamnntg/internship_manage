<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Question::class, 100)->create()->each(function( $question) {
            $anwser = factory(App\Models\Answer::class, 4)->create([
                'question_id' => $question->id,
            ]);
        });
    }
}
