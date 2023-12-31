<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Group;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subsection;
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
            $html = Course::create([
                'group_id' => $group1->id,
                'name' => 'HTML basic',
                'description' => 'Basic HTML',
                'slug' => 'html'
            ]);
                $article1 = Article::create([
                    'course_id' => $html->id,
                    'title' => 'HTML Introduction',
                    'description' => 'Introduction to HTML'
                ]);
                $article2 = Article::create([
                    'course_id' => $html->id,
                    'title' => 'HTML Basic',
                    'description' => 'HTML basic'
                ]);
                $article3 = Article::create([
                    'course_id' => $html->id,
                    'title' => 'HTML Elements',
                    'description' => 'HTML elements'
                ]);
                $article4 = Article::create([
                    'course_id' => $html->id,
                    'title' => 'HTML Attributes',
                    'description' => 'HTML Attributes'
                ]);
                Exercise::create([
                    'course_id' => $html->id,
                    'title' => 'HTML basic 1',
                    'description' => 'HTML elements are surrounded by a specific type of brackets, which one?',
                    'text_content' => '[.....]p[.....]This is a paragraph.[.....]/p[.....]',
                    'answer' => '<p>This is a paragraph.</p>'
                ]);
                Exercise::create([
                    'course_id' => $html->id,
                    'title' => 'HTML basic 2',
                    'description' => 'Fill inn the missing code to complete the markup of the HTML hyperlink.',
                    'text_content' => '[.....] href="https://www.w3schools.com">This is a link[.....]',
                    'answer' => '<a href="https://www.w3schools.com">This is a link</a>'
                ]);
                Exercise::factory(3)->create([
                    'course_id' => $html->id
                ]);
                Quiz::factory(3)->create([
                    'course_id' => $html->id
                ]);
                    $sec1 = Section::create([
                        'article_id' => $article1->id,
                        'title' => 'A Simple HTML Document 1'
                    ]);
                    $sec1->order = $sec1->id; $sec1->save();
                        $sub1 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 1,
                            'text_content' => "HTML stands for Hyper Text Markup Language<div>Html describes the structure of a web page</div>"
                        ]);
                        $sub1->order = $sub1->id; $sub1->save();

                        $sub2 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 2,
                            'code_example' => "&lt;h1&gt;My First heading&lt;/h1&gt;&lt;p&gt;My first paragraph&lt;/p&gt;"
                        ]);
                        $sub2->order = $sub2->id; $sub2->save();
                        
                        $sub3 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 3,
                            'link_title' => 'Try our CSS course',
                            'link' => 'https://github.com/ta457/'
                        ]);
                        $sub3->order = $sub3->id; $sub3->save();

                        $sub4 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 4,
                            'img' => 'https://www.w3schools.com/html/img_chrome.png',
                        ]);
                        $sub4->order = $sub4->id; $sub4->save();

                        $sub5 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 5,
                            'exercise_id' => 1
                        ]);
                        $sub5->order = $sub5->id; $sub5->save();

                        $sub6 = Subsection::create([
                            'section_id' => $sec1->id,
                            'type' => 6,
                            'quiz_id' => 1
                        ]);
                        $sub6->order = $sub6->id; $sub6->save();

                    $sec2 = Section::create([
                        'article_id' => $article1->id,
                        'title' => 'A Simple HTML Document 2'
                    ]);
                    $sec2->order = $sec2->id; $sec2->save();
                        $sub7 = Subsection::create([
                            'section_id' => $sec2->id,
                            'type' => 1,
                            'text_content' => "The &lt;!DOCTYPE html&gt; declaration defines that this document is an HTML5 document<div>The &lt;html&gt; element is the root element of an HTML page</div><div>The &lt;head&gt; element contains meta information about the HTML page</div>"
                        ]);
                        $sub7->order = $sub7->id; $sub7->save();
                        $sub8 = Subsection::create([
                            'section_id' => $sec2->id,
                            'type' => 2,
                            'code_example' => "&lt;!DOCTYPE html&gt;<div>&lt;html&gt;</div><div>&lt;head&gt;</div><div>&lt;title&gt;Page Title&lt;/title&gt;</div><div>&lt;/head&gt;</div><div>&lt;body&gt;</div><div>&lt;h1&gt;This is a heading&lt;/h1&gt;</div><div>&lt;p&gt;This is a paragraph&lt;/p&gt;</div><div>&lt;/body&gt;</div><div>&lt;/html&gt;</div>",
                        ]);
                        $sub8->order = $sub8->id; $sub8->save();

            $css = Course::create([
                'group_id' => $group1->id,
                'name' => 'CSS basic',
                'description' => 'Basic CSS',
                'slug' => 'css'
            ]);
                Article::create([
                    'course_id' => $css->id,
                    'title' => 'CSS Introduction',
                    'description' => 'Introduction to CSS'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $css->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $css->id
                ]);
            $bstrap = Course::create([
                'group_id' => $group1->id,
                'name' => 'Bootstrap',
                'description' => 'Bootstrap',
                'slug' => 'bootstrap'
            ]);
                Article::create([
                    'course_id' => $bstrap->id,
                    'title' => 'Bootstrap Introduction',
                    'description' => 'Introduction to Bootstrap'
                ]);
            $tailwind = Course::create([
                'group_id' => $group1->id,
                'name' => 'Tailwind CSS',
                'description' => 'Tailwind CSS',
                'slug' => 'tailwind-css'
            ]);
                Article::create([
                    'course_id' => $tailwind->id,
                    'title' => 'Tailwind Introduction',
                    'description' => 'Introduction to Tailwind'
                ]);
            $sass = Course::create([
                'group_id' => $group1->id,
                'name' => 'Sass',
                'description' => 'Sass',
                'slug' => 'sass'
            ]);
                Article::create([
                    'course_id' => $sass->id,
                    'title' => 'Sass Introduction',
                    'description' => 'Introduction to Sass'
                ]);
                
        $group2 = Group::create([
            'name' => 'JavaScript',
            'description' => 'All JavaScript related courses'
        ]);
            $jsBasic = Course::create([
                'group_id' => $group2->id,
                'name' => 'JavaScript basic',
                'description' => 'Basic JavaScript',
                'slug' => 'js-basic'
            ]);
                Article::create([
                    'course_id' => $jsBasic->id,
                    'title' => 'Js basic 1',
                    'description' => 'Js basic 1'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $jsBasic->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $jsBasic->id
                ]);
            $react = Course::create([
                'group_id' => $group2->id,
                'name' => 'ReactJS',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'react'
            ]);
                Article::create([
                    'course_id' => $react->id,
                    'title' => 'React basic 1',
                    'description' => 'React basic 1'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $react->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $react->id
                ]);
            $vue = Course::create([
                'group_id' => $group2->id,
                'name' => 'Vue',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'vue'
            ]);
                Article::create([
                    'course_id' => $vue->id,
                    'title' => 'Vue basic 1',
                    'description' => 'Vue basic 1'
                ]);
            $ang = Course::create([
                'group_id' => $group2->id,
                'name' => 'Angular',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'angular'
            ]);
                Article::create([
                    'course_id' => $ang->id,
                    'title' => 'Angular basic 1',
                    'description' => 'Angular basic 1'
                ]);
        
        $group3 = Group::create([
            'name' => 'Backend',
            'description' => 'All backend related courses'
        ]);
            $php = Course::create([
                'group_id' => $group3->id,
                'name' => 'PHP',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'php'
            ]);
                Article::create([
                    'course_id' => $php->id,
                    'title' => 'Php basic 1',
                    'description' => 'Php basic 1'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $php->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $php->id
                ]);
            $py = Course::create([
                'group_id' => $group3->id,
                'name' => 'Python',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'python'
            ]);
                Article::create([
                    'course_id' => $py->id,
                    'title' => 'Python basic 1',
                    'description' => 'Python basic 1'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $py->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $py->id
                ]);
            $sql = Course::create([
                'group_id' => $group3->id,
                'name' => 'SQL',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'sql'
            ]);
                Article::create([
                    'course_id' => $sql->id,
                    'title' => 'Sql Introduction',
                    'description' => 'Introduction to Sql'
                ]);
            $java = Course::create([
                'group_id' => $group3->id,
                'name' => 'Java',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'java'
            ]);
                Article::create([
                    'course_id' => $java->id,
                    'title' => 'Java Introduction',
                    'description' => 'Introduction to Java'
                ]);
        $group4 = Group::create([
            'name' => 'Web Building',
            'description' => 'All Web Building related courses'
        ]);
            $crWeb = Course::create([
                'group_id' => $group4->id,
                'name' => 'Create a website',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'create-web'
            ]);
                Article::create([
                    'course_id' => $crWeb->id,
                    'title' => 'Web Introduction',
                    'description' => 'Introduction to Web'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $crWeb->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $crWeb->id
                ]);
            $crSer = Course::create([
                'group_id' => $group4->id,
                'name' => 'Create a server',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'create-server'
            ]);
                Article::create([
                    'course_id' => $crSer->id,
                    'title' => 'Server Introduction',
                    'description' => 'Introduction to Server'
                ]);
            $webTp = Course::create([
                'group_id' => $group4->id,
                'name' => 'Web templates',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'web-templates'
            ]);
                Article::create([
                    'course_id' => $webTp->id,
                    'title' => 'Web template Introduction',
                    'description' => 'Introduction to Web template'
                ]);
        $group5 = Group::create([
            'name' => 'Data Analytics',
            'description' => 'All Data Analytics related courses'
        ]);
            $ai = Course::create([
                'group_id' => $group5->id,
                'name' => 'AI',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'ai'
            ]);
                Article::create([
                    'course_id' => $ai->id,
                    'title' => 'AI Introduction',
                    'description' => 'Introduction to AI'
                ]);
            $genAi = Course::create([
                'group_id' => $group5->id,
                'name' => 'Generative AI',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'gen-ai'
            ]);
                Article::create([
                    'course_id' => $genAi->id,
                    'title' => 'GenAI Introduction',
                    'description' => 'Introduction to GenAI'
                ]);
            $gpt = Course::create([
                'group_id' => $group5->id,
                'name' => 'ChatGPT',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'chat-gpt'
            ]);
                Article::create([
                    'course_id' => $gpt->id,
                    'title' => 'ChatGPT Introduction',
                    'description' => 'Introduction to ChatGPT'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $gpt->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $gpt->id
                ]);
            $ml = Course::create([
                'group_id' => $group5->id,
                'name' => 'Machine Learning',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'machine-learning'
            ]);
                Article::create([
                    'course_id' => $ml->id,
                    'title' => 'Machine learning Introduction',
                    'description' => 'Introduction to Machine learning'
                ]);
            $ds = Course::create([
                'group_id' => $group5->id,
                'name' => 'Data Science',
                'description' => 'Free and open-source front-end JavaScript library for building user interfaces',
                'slug' => 'data-science'
            ]);
                Article::create([
                    'course_id' => $ds->id,
                    'title' => 'Data science Introduction',
                    'description' => 'Introduction to Data science'
                ]);
                Exercise::factory(2)->create([
                    'course_id' => $ds->id
                ]);
                Quiz::factory(2)->create([
                    'course_id' => $ds->id
                ]);
    }
}
