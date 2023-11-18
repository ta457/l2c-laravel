<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'github',
        'active',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getRoleNameAttribute()
    {
        $roles = [1 => 'Admin', 2 => 'Editor', 3 => 'User'];
        return $roles[$this->attributes['role']];
    }
    public function getActiveStatusAttribute()
    {
        $activeStatus = [1 => 'Active', 0 => 'Inactive'];
        return $activeStatus[$this->attributes['active']];
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class)->withPivot('finish')->withTimestamps();
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)->withPivot('finish')->withTimestamps();
    }

    public function finishedQuizzes()
    {
        return $this->quizzes()->wherePivot('finish', true);
    }

    public function finishedExercises()
    {
        return $this->exercises()->wherePivot('finish', true);
    }

    // // Record that a user has viewed a quiz and finished it
    // $user = User::find(1);
    // $quiz = Quiz::find(1);
    // $user->quizzes()->attach($quiz, ['finish' => true]);

    // // Record that a user has viewed an exercise
    // $user->exercises()->attach($exercise);

    // // Get quizzes viewed by a user
    // $quizzesViewedByUser = User::find(1)->quizzes;

    // // Get exercises viewed by a user
    // $exercisesViewedByUser = User::find(1)->exercises;

    // Get all quizzes that the user has finished
    // $finishedQuizzes = $user->finishedQuizzes;
}
