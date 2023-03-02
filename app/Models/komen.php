<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komen extends Model
{
    use HasFactory;
    protected $table="komen";
    protected $primaryKey="id";
    protected $with=["user"];
    protected $fillable = [
        'user_id',
        'name',
        'comment',
        'post_id',
        'parent_id',
    ];
    public function berita()
    {
    return $this->belongsTo(berita::class);
    }
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(komen::class, 'parent_id');
    }
}
