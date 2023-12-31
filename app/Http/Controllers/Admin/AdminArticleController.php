<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminArticleController extends Controller
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

    public function index()
    {   
        //filtering using the table search box
        $articles = Article::with('course');
        if(request('sort_by_time') == 'latest') {
            $articles = Article::latest();
        }
        
        if(request('search')) {
            $articles
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if(request('course_id') && request('course_id') !== 0) {
            $articles->where('course_id', 'like', '%' . request('course_id') . '%');
        }

        //return view
        $props = [
            'articles' => $articles->paginate(10),
            'courses' => Course::all()
        ];
        return view('admin.admin-article', ['props' => $props]);
    }

    public function store()
    {   
        $attributes = request()->validate([
            'course_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $attributes['course_id'] = $attributes['course_id'] * 1;
        //check if article title already exist
        if(Article::where('title', $attributes['title'])->exists()) {
            return redirect($this->getDashboardUrl() . '/articles')->with('failed', 'Article title already exist');
        } else {
            Article::create($attributes);
        }
        return redirect($this->getDashboardUrl() . '/articles')->with('success', 'New article added');
    }

    public function edit(Article $article)
    {
        $props = [
            'article' => $article,
            'courses' => Course::all()
        ];
        return view('admin.edit-article', ['props' => $props]);
    }

    public function update(Article $article)
    {   
        $attributes = request()->validate([
            'course_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $article->update($attributes);
        //check if there is another article with this name but different id
        if(Article::where('title', $attributes['title'])->where('id', '!=', $article->id)->get()->count() > 0) {
            return redirect($this->getDashboardUrl() . "/articles/$article->id")->with('failed', 'Article title already exist');
        } else {
            $article->update($attributes);
        }
        return redirect($this->getDashboardUrl() . "/articles/$article->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect($this->getDashboardUrl() . '/articles')->with('success', 'Article deleted');
    }

    public function destroyAll(Request $request)
    {
        $selectedArticles = $request->input('selected', []);
        
        Article::whereIn('id', $selectedArticles)->delete();

        return redirect($this->getDashboardUrl() . '/articles')->with('success', 'Selected articles have been deleted');
    }
}
