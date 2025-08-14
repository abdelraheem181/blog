<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Author extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name','bio'];
    
    protected $fillable = [
        'name',
        'email',
        'bio',
        'phone_no',
        'profile_picture',
        'website',
        'social_links'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
}
