<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    protected $table = 'level';
    protected $primaryKey="id";
    protected $fillable =[
    'id',
    'level',

    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
