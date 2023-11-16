<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Group;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //User role:
        //1 => admin
        //2 => editor
        //3 => user
        
        User::factory(10)->create();

        $group1 = Group::create([
            'name' => 'HTML and CSS',
            'description' => 'All HTML and CSS related courses'
        ]);
            $course1 = Course::create([
                'group_id' => $group1->id,
                'name' => 'HTML basic',
                'description' => 'Basic HTML',
                'slug' => 'html'
            ]);
                $article1 = Article::create([
                    'course_id' => $course1->id,
                    'title' => 'HTML Introduction',
                    'description' => 'Introduction to HTML'
                ]);
                    Section::factory(5)->create([
                        'article_id' => $article1->id
                    ]);
                Exercise::factory(5)->create([
                    'course_id' => $course1->id
                ]);
                Quiz::factory(5)->create([
                    'course_id' => $course1->id
                ]);
            Course::create([
                'group_id' => $group1->id,
                'name' => 'CSS basic',
                'description' => 'Basic CSS',
                'slug' => 'css'
            ]);

        $group2 = Group::create([
            'name' => 'JavaScript',
            'description' => 'All JavaScript related courses'
        ]);
            Course::create([
                'group_id' => $group2->id,
                'name' => 'JavaScript basic',
                'description' => 'Basic JavaScript',
                'slug' => 'javascript-basic'
            ]);
            Course::create([
                'group_id' => $group2->id,
                'name' => 'ReactJS',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'react'
            ]);
    }
}
