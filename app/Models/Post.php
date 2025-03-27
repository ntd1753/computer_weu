<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'images',
        'seo_title', 'seo_keywords', 'seo_description'
    ];



    const TYPE_POST = 'POST';
    const TYPE_PRODUCT = 'PRODUCT';
    public function scopeTitle($query, $filter){
        return !empty($filter) ? $query->where('title','like','%'.$filter.'%') : $query;
    }

    public function scopeAuthorName($query, $filter)
    {
        return !empty($filter) ? $query->whereHas('author', function ($q) use ($filter) {
            $q->where('name', 'like', '%' . $filter . '%');
        }) : $query;
    }

    public function author(){
        return $this->belongsTo(Admin::class,'author_id','id');
    }
}
