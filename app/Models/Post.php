<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;
    use Timestamp;

    protected $fillable =[
        'title',
        'body'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function scopeLatest( $query){
        return $query->orderBy('id', 'asc')->get();
    }

      /**
     * Get the post's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
