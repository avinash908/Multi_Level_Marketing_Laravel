<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->delete();

        DB::table('faqs')->insert([      
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'What does LOREM mean?',
                'description' => '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
