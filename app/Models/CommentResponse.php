<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'author_name',
        'author_email',
        'comment_id',
    ];

    public function comment():BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
