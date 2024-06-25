<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'cover_img',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function($model){
            if(empty($model->slug)){
                $randomNumber = rand(100, 9999999);
                $model->slug = Str::slug($model->name). '-'. $randomNumber;
            }
        });
        static::updating(function($model){
            if($model->isDirty('name')){
                $randomNumber = rand(100, 9999999);
                $model->slug = Str::slug($model->name). '-'. $randomNumber;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles (): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
