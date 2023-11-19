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

        User::create([
            'email' => 'admin@gmail.com',
            'password' => '11111111',
            'name' => 'Anh Tu',
            'role' => 1,
            'phone' => '0900000000',
            'github' => 'https://github.com/ta457/'
        ]);
        User::create([
            'email' => 'editor@gmail.com',
            'password' => '11111111',
            'name' => 'editor1',
            'role' => 2,
            'phone' => '0900000000',
            'github' => 'https://github.com/ta457/'
        ]);
        User::create([
            'email' => 'user@gmail.com',
            'password' => '11111111',
            'name' => 'user1',
            'role' => 3,
            'phone' => '0900000000',
            'github' => 'https://github.com/ta457/'
        ]);
        User::factory(10)->create();

        $group0 = Group::create([
            'name' => 'Unassigned',
            'description' => 'Courses that haven\'t been assigned to a group'
        ]);
            $course0 = Course::create([
                'group_id' => $group0->id,
                'name' => 'Unassigned',
                'description' => 'Articles, Quizzes and Exercises that haven\'t been assigned to a course',
                'slug' => 'unassigned'
            ]);
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
                $article2 = Article::create([
                    'course_id' => $course1->id,
                    'title' => 'HTML Basic',
                    'description' => 'HTML basic'
                ]);
                $article3 = Article::create([
                    'course_id' => $course1->id,
                    'title' => 'HTML Elements',
                    'description' => 'HTML elements'
                ]);
                Exercise::factory(5)->create([
                    'course_id' => $course1->id
                ]);
                Quiz::factory(5)->create([
                    'course_id' => $course1->id
                ]);
                    Section::create([
                        'article_id' => $article1->id,
                        'title' => 'A Simple HTML Document 1',
                        'text_content' => "HTML stands for Hyper Text Markup Language<div>Html describes the structure of a web page</div>",
                        'code_example' => "&lt;h1&gt;My First Heading&lt;/h1&gt;<div>&lt;p&gt;My first paragraph&lt;/p&gt;</div>",
                        'link_title' => 'Try our CSS course',
                        'link' => 'https://github.com/ta457/',
                        'img' => 'https://www.w3schools.com/html/img_chrome.png',
                        'exercise_id' => 1,
                        'quiz_id' => 1
                    ]);
                    Section::create([
                        'article_id' => $article1->id,
                        'title' => 'A Simple HTML Document 2',
                        'text_content' => "The &lt;!DOCTYPE html&gt; declaration defines that this document is an HTML5 document<div>The &lt;html&gt; element is the root element of an HTML page</div><div>The &lt;head&gt; element contains meta information about the HTML page</div>",
                        'code_example' => "&lt;!DOCTYPE html&gt;<div><title>Page Title</title>
                        
                        
                        
                        
                        </div>
                          <div>&lt;html&gt;</div><div>&lt;head&gt;</div><div>&lt;/head&gt;</div><div>&lt;body&gt;</div><div>&lt;/body&gt;</div><div>&lt;/html&gt;</div>",
                        'quiz_id' => 2
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
        
        $group3 = Group::create([
            'name' => 'Backend',
            'description' => 'All backend related courses'
        ]);
        $group4 = Group::create([
            'name' => 'Web Building',
            'description' => 'All Web Building related courses'
        ]);
        $group5 = Group::create([
            'name' => 'Data Analytics',
            'description' => 'All Data Analytics related courses'
        ]);
    }
}
