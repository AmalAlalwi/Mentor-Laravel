<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
