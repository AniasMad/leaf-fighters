<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorySection extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'story_id',
        'order',
        'image',
        'status'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
