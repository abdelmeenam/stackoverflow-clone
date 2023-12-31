<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    //mass assignment
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    protected $hidden = [
        'updated_at',
    ];

    //relationship  with answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship with tag
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     // Related model
            'question_tag', // Pivot table
            'question_id',  // F.K for current model in pivot table
            'tag_id',       // F.K for related model in pivot table
            'id',           // P.K for current model
            'id'            // P.K for related model
        );
    }

}
