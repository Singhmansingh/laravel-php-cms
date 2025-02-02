<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'url',
        'git',
        'content',
        'slug',
        'image',
        'type_id',
        'user_id',
    ];

    public function manySkills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function skillIds()
    {
        return $this->manySkills->pluck('id')->toArray();
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
