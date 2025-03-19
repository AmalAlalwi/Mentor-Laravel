<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = ['title','AliceName','description','price','Image','teacher_id'];
    public function teacher(): \Illuminate\Database\Eloquent\Relations\BelongsTo{
        return $this->belongsTo(Teacher::class);
    }

}
