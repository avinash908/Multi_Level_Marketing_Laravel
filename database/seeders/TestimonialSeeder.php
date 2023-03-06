<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->delete();

        DB::table('testimonials')->insert([      
            [
                'name'  => 'John',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'  => 'Rock',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'  => 'Doe',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'  => 'Bill',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'  => 'Mark',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'  => 'Elon',
                'image'  => 'avatar-' . rand(1,3) . '.jpg',
                'job'   => 'Client',
                'rating'=> rand(1,5),
                'is_featured'=>true,
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisici elit… (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        ]);
    }
}
