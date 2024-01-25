<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'uuid', 'description', 'image'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
