<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $table="berita";
    protected $primaryKey="id";
    protected $with=["user"];
    protected $fillable = [
        'user_id',
        'tipe_berita_id',
        'judul',
        'isi_berita',
        'is_approve',
        'is_delete',
        'dibuatpada',
        'status',
    ]; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipe_berita()
    {
        return $this->belongsTo(tipe_berita::class,);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
