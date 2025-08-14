<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Post extends Model
{ 
    use HasFactory, HasTranslations;
 
    public $translatable = ['title', 'content'];
    
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id',
        'category_id',
        'image_cover',
        'is_published',
        'published_at',
        'views'
    ];



    public function author()
    {
        return $this->belongsTo(Author::class)->withDefault(['name' => 'غير محدد']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
