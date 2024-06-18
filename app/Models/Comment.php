<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'author_name',
        'author_email',
        'article_id',
    ];

    public function article():BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
