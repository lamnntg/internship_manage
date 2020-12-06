<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class QuestionCategorySeeder extends Seeder
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
                'name' => 'Anh ',
            ],
            [
                'name' => 'Toan ',
            ],
            [
                'name' => 'Van ',
            ],
            [
                'name' => 'Tin Hoc ',
            ],
            [
                'name' => 'Su ',
            ],
            [
                'name' => 'Dia ',
            ],
            [
                'name' => 'Hoa ',
            ],

        ];
        DB::table('question_categories')->insert($data);
    }
}
