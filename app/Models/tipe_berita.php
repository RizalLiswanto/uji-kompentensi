<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe_berita extends Model
{
    use HasFactory;
    protected $table="tipe_berita";
    protected $primaryKey="id";
    protected $with=['berita'];
    protected $fillable = [
        'id',
        'tipe',
    ]; 

    public function berita()
    {
        return $this->hasMany(berita::class);
    }
}
