<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);

        // Attach a user to an article
        // $user = User::find(1);
        // $article = Article::find(1);
        // $user->articles()->attach($article);

        // // Detach a user from an article
        // $user->articles()->detach($article);

        // // Sync users for an article (replace existing relationships with the given user IDs)
        // $article->users()->sync([1, 2, 3]);

        // $user = User::find(1);
        // $article = Article::find(1);
        // // Record that the user has viewed the article
        // $user->articles()->attach($article);
        // Get articles viewed by a user
        // $articlesViewedByUser = User::find(1)->articles;
        // // Get users who have viewed a specific article
        // $usersViewingArticle = Article::find(1)->users;
    }
}
