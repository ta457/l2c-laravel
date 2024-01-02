<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Exercise;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSectionController extends Controller
{
    public function getDashboardUrl() {
        $dashboardUrl = '';
        if(Auth::user()->role == 1) {
            $dashboardUrl = '/admin-dashboard';
        } else if(Auth::user()->role == 2) {
            $dashboardUrl = '/editor-dashboard';
        }
        return $dashboardUrl;
    }

    public function index(Article $article)
    {   
        $sections = $article->sections;
    
        $props = [
            'sections' => $sections,
            'article' => $article,
            'exercises' => Exercise::all(),
            'quizzes' => Quiz::all()
        ];
        return view('admin.admin-sections', ['props' => $props]);
    }

    public function store(Article $article)
    {
        $sectionAttributes = request()->validate([
            'title' => 'required|max:255',
            'article_id' => 'required|numeric'
        ]);
        //check if section title is already exist
        if(Section::where('title', $sectionAttributes['title'])->exists()) {
            return redirect($this->getDashboardUrl() . "/articles/$article->id/content")->with('failed', 'Section title already exist');
        } else {
            $newSection = Section::create($sectionAttributes);
            $newSection->order = $newSection->id;
            $newSection->save();
        }
        return redirect($this->getDashboardUrl() . "/articles/$article->id/content")->with('success', 'New section created');
    }

    public function edit(Section $section)
    {
        $props = [
            'section' => $section,
            'subsections' => $section->subsections,
            'exercises' => Exercise::all(),
            'quizzes' => Quiz::all(),
            'articles' => Article::all()
        ];
        return view('admin.edit-section', ['props' => $props]);
    }

    public function update(Section $section)
    {
        //dd(request());
        $sectionAttributes = request()->validate([
            'title' => 'required|max:255',
            'article_id' => 'required|numeric'
        ]);
        //check if there is another section with this title but different id
        if(Section::where('title', $sectionAttributes['title'])->where('id', '!=', $section->id)->exists()) {
            return redirect($this->getDashboardUrl() . "/sections/$section->id")->with('failed', 'Section title already exist');
        } else {
            $section->update($sectionAttributes);
        }
        
        return redirect($this->getDashboardUrl() . "/sections/$section->id")->with('success', 'Your changes have been saved');
    }

    public function delete(Section $section)
    {        
        foreach ($section->subsections as $subsection) {
            $subsection->delete();
        }
        $section->delete();

        $articleId = $section->article->id;
        return redirect($this->getDashboardUrl() . "/articles/$articleId/content")->with('success', 'Section deleted');
    }

    public function updateSectionBackward(Section $section)
    {
        $previousSection = Section::where('article_id', $section->article_id)
        ->where('order', '<', $section->order)
        ->orderBy('order', 'desc')
        ->first();

        if ($previousSection) {
            // Swap
            $tempOrder = $previousSection->order;
            $previousSection->order = $section->order;
            $section->order = $tempOrder;
            $previousSection->save();
            $section->save();
        }

        $articleId = $section->article->id;
        return redirect($this->getDashboardUrl() . "/articles/$articleId/content")->with('success', 'Your changes have been saved');
    }

    public function updateSectionForward(Section $section)
    {
        $nextSection = Section::where('article_id', $section->article_id)
            ->where('order', '>', $section->order)
            ->orderBy('order')
            ->first();

        if ($nextSection) {
            // Swap
            $tempOrder = $nextSection->order;
            $nextSection->order = $section->order;
            $section->order = $tempOrder;
            $nextSection->save();
            $section->save();
        }

        $articleId = $section->article->id;
        return redirect($this->getDashboardUrl() . "/articles/$articleId/content")->with('success', 'Your changes have been saved');
    }

    // Section content (subsections)===================================================================

    public function storeSubsection(Section $section)
    {
        $attributes = request()->validate([
            'section_id' => 'required|numeric',
            'type' => 'required|numeric'
        ]);

        $newSub = Subsection::create($attributes);
        $newSub->order = $newSub->id;
        $newSub->save();
        return redirect($this->getDashboardUrl() . "/sections/$section->id")->with('success', 'New subsection added');
    }

    public function updateSubsection(Subsection $subsection)
    {   
        $attributes = request()->validate([
            'text_content' => 'nullable',
            'code_example' => 'nullable',
            'link' => 'nullable|max:255',
            'link_title' => 'nullable|max:255',
            'img' => 'nullable',
            'exercise_id' => 'nullable|numeric|min:1',
            'quiz_id' => 'nullable|numeric|min:1'
        ]);

        if (request()->type == 4) {
            if ($attributes['img'] == null) {
                $attributes['img'] = $subsection->img;
            } else {
                $attributes['img'] = request()->file('img')->store('subsection-img');
                if($subsection->img) {
                    Storage::delete($subsection->img);
                }
            }
        }
        
        $subsection->update($attributes);
        $sectionId = $subsection->section->id;
        return redirect($this->getDashboardUrl() . "/sections/$sectionId")->with('success', 'Your changes have been saved');
    }

    public function deleteSubsection(Subsection $subsection)
    {
        $subsection->delete();
        $sectionId = $subsection->section->id;
        return redirect($this->getDashboardUrl() . "/sections/$sectionId")->with('success', 'Subsection deleted');

    }

    public function updateSubsectionBackward(Subsection $subsection)
    {
        $previousSubsection = Subsection::where('section_id', $subsection->section_id)
        ->where('order', '<', $subsection->order)
        ->orderBy('order', 'desc')
        ->first();

        if ($previousSubsection) {
            // Swap
            $tempOrder = $previousSubsection->order;
            $previousSubsection->order = $subsection->order;
            $subsection->order = $tempOrder;
            $previousSubsection->save();
            $subsection->save();
        }

        $sectionId = $subsection->section->id;
        return redirect($this->getDashboardUrl() . "/sections/$sectionId")->with('success', 'Your changes have been saved');
    }

    public function updateSubsectionForward(Subsection $subsection)
    {
        $nextSubsection = Subsection::where('section_id', $subsection->section_id)
            ->where('order', '>', $subsection->order)
            ->orderBy('order')
            ->first();

        if ($nextSubsection) {
            // Swap
            $tempOrder = $nextSubsection->order;
            $nextSubsection->order = $subsection->order;
            $subsection->order = $tempOrder;
            $nextSubsection->save();
            $subsection->save();
        }

        $sectionId = $subsection->section->id;
        return redirect($this->getDashboardUrl() . "/sections/$sectionId")->with('success', 'Your changes have been saved');
    }
}
