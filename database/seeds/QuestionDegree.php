<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionDegree extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'name' => 'Cuc De ',
            ],
            [
                'name' => 'De ',
            ],
            [
                'name' => 'Vua ',
            ],
            [
                'name' => 'Kho ',
            ],
            [
                'name' => 'Cuc Kho ',
            ],
        ];
        DB::table('question_degrees')->insert($data);
    }
}
