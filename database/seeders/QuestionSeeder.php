<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Facades\File;

class QuestionSeeder extends Seeder
{

    public function run(): void
    {
        $json = File::get("database/data/questions.json");
        $questions = json_decode($json,true);

        foreach ($questions as $question_data) {
            $question = new Question();
            $question->question_bank_id = $question_data['question_bank_id'];
            $question->text = $question_data['text'];
            $question->option_a = $question_data['option_a'];
            $question->option_b = $question_data['option_b'];
            $question->option_c = $question_data['option_c'];
            $question->option_d = $question_data['option_d'];
            $question->save();
        }
    }
}
