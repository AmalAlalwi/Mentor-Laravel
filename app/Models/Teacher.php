<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'lastname', 'specialization', 'description', 'email', 'password'];


    public function socialMedia(): HasMany
    {
        return $this->hasMany(SocialMedia::class, foreignKey: 'user_id');
    }
    public function courses(): HasMany{
        return $this->hasMany(Course::class, foreignKey: 'teacher_id');
    }




}
