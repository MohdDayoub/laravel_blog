<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class, 'author_id');
        // return $this->belongsTo(Authors::class,'id','author_id');
    }
}
