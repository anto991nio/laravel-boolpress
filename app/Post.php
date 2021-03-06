<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id', "category_id","post_id","tag_id","image_url"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
    
    public function tags()
    {
        return $this->belongsToMany("App\Tag");
    }
}
